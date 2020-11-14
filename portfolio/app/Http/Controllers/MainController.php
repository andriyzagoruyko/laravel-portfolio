<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Info;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\TagLocalization;
use App\Models\InfoLocalization;
use App\Models\ConfigLocalization;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MainController extends Controller
{
    public function index($tagSlug = null) 
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $tag = null;

        $projectQuery = Project::orderBy('created_at', 'desc')->with('media')->withLocalization($locale);

        if (!is_null($tagSlug)) {
            $tag = Tag::where('slug', $tagSlug)->firstOrFail();
            $projectQuery->where('tag_id', $tag->id);
        }

        $resultPerPage = 4;
        $resultCount = $projectQuery->count();
        $projectMaxPages = floor($resultCount/$resultPerPage);

        if ($resultCount % $resultPerPage >= 2){
            $projectMaxPages++;
        };

        $projects = $projectQuery->limit($resultPerPage)->get();

        $data = [
            'configLocalization' => ConfigLocalization::where('lang', $locale)->first(),
            'info' => Info::withLocalization($locale)->first(),
            'tags' =>  Tag::withLocalization($locale)->get(),
            'technologies' => Technology::where('in_header', 1)->orderBy('order')->with('media')->get(),
            'projects' => $projects,
            'maxPages' => $projectMaxPages,
            'mainTag' => $tag,
            'locale' => $locale
        ];

        return view('index', $data);
    }

    public function singleProject($projectSlug) {
        $locale = LaravelLocalization::getCurrentLocale();
        $project = Project::withLocalization($locale)->where('slug', $projectSlug)->firstOrFail();
        return view('single-project', compact('locale', 'project'));
    }

    public function getProjects($locale, $tagId = null, Request $request) {
        $projectQuery = Project::query()->orderBy('created_at', 'desc')->withLocalization($locale)->with('media');

        if (!is_null($tagId)) {
            $projectQuery->where('tag_id', $tagId);
        }

        $projectMaxPages = 0;
        $resultPerPage = $request->count;

        if ($request->has('count')) {
            $resultCount = $projectQuery->count();
            $projectMaxPages = floor($resultCount/$resultPerPage);
    
            if ($resultCount % $resultPerPage >= 2){
                $projectMaxPages++;
            };
    
            if ($request->has('page')) {
                $projectQuery->skip($request->count * $request->page + $request->skip);
            }
        }

        $projects = $projectQuery->limit($resultPerPage)->get();
        $firstWithLargeThumb = !$request->has('page') || $request->page == 0;

        return response()->json([
            'maxPages' => $projectMaxPages,
            'view' => [
                'projects' => view('layouts.projects', compact('projects', 'firstWithLargeThumb'))->render(),
                'slides' => view('layouts.slides', compact('projects', 'firstWithLargeThumb'))->render(),
            ]
        ]);
    }
}

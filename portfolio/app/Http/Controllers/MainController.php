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
use Illuminate\Support\Facades\App;
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
        $projectMaxPages = ceil($resultCount/$resultPerPage);
        $projects = $projectQuery->limit($resultPerPage)->get();

        $data = [
            'configLocalization' => ConfigLocalization::where('lang', $locale)->first(),
            'info' => Info::withLocalization($locale)->first(),
            'tags' =>  Tag::withLocalization($locale)->get(),
            'technologies' => Technology::where('in_header', 1)->orderBy('order')->with('media')->get(),
            'projects' => $projects,
            'maxPages' => $projectMaxPages,
            'mainTag' => $tag,
            'locale' => $locale,
            'homepage' => true
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
        $data = $request->json()->all();

        if (array_key_exists('count', $data)) {
            $resultPerPage = $data['count'];
            $resultCount = $projectQuery->count() - (array_key_exists('skip', $data) ? $data['skip'] : 0);
            $projectMaxPages = ceil($resultCount/$resultPerPage);

            if (array_key_exists('page', $data)) {
                $projectQuery->skip($data['count'] * $data['page'] + (array_key_exists('skip', $data) ? $data['skip'] : 0));
            }
        }

        $projects = $projectQuery->limit($resultPerPage)->get();
        $firstWithLargeThumb = !array_key_exists('page', $data) ||$data['page'] == 0;

        App::setLocale($locale);

        return response()->json([
            'maxPages' => $projectMaxPages,
            'view' => [
                'projects' => view('layouts.projects', compact('projects', 'firstWithLargeThumb'))->render(),
                'slides' => view('layouts.slides', compact('projects', 'firstWithLargeThumb'))->render(),
            ]
        ]);
    }
}

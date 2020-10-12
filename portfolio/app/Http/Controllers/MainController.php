<?php

namespace App\Http\Controllers;

use App\Models\Tag;
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

        $projectQuery = Project::query()->withLocalization($locale);

        if (!is_null($tagSlug)) {
            $tag = Tag::where('slug', $tagSlug)->firstOrFail();
            $projectQuery->where('tag_id', $tag->id);
        }

        $projects = $projectQuery->limit(4)->get();
        $projectMaxPages = ceil($projectQuery->count() / 4);

        $data = [
            'configLocalization' => ConfigLocalization::where('lang', $locale)->first(),
            'infoLocalization' => InfoLocalization::where('lang', $locale)->first(),
            'tagsLocalization' =>  TagLocalization::where('lang', $locale)->get(),
            'technologies' => Technology::where('in_header', 1)->get(),
            'projects' => $projects,
            'maxPages' => $projectMaxPages,
            'tag' => $tag,
            'locale' => $locale
        ];

        return view('index', $data);
    }

    public function getProjects($locale, Tag $tag = null, Request $request) {
        $projectQuery = Project::query()->withLocalization($locale);

        if (!is_null($tag)) {
            $projectQuery->where('tag_id', $tag->id);
        }

        $maxPages = 0;

        if ($request->has('count')) {
            $maxPages = ceil($projectQuery->count() / $request->count);

            if ($request->has('page')) {
                $projectQuery->skip($request->count * $request->page + $request->skip);
            }

            $projectQuery->take($request->count);
        }

        $projects = $projectQuery->get();
        $firstWithLargeThumb = !$request->has('page') || $request->page == 0;

        return response()->json([
            'maxPages' => $maxPages,
            'data' => $projects,
            'view' => view('projects', compact('projects', 'firstWithLargeThumb'))->render(),
        ]);
    }
}

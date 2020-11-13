<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Classes\EditingLocalization;
use App\Models\Tag;
use App\Models\TagLocalization;
use App\Models\Project;
use App\Models\ProjectLocalization;
use App\Models\Technology;


class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = EditingLocalization::getSupportedLocales();
        
        $technologies = Technology::factory()->count(2)->create()
            ->each(function($technology)
            {
                $technology->addMediaFromUrl(url('/demo/technology'). '/' . random_int(1, 3) . '.svg')->toMediaCollection('images');
            });

        $tags = Tag::factory()->count(2)->create()
            ->each(function($tag) use ($locales) 
            {
                foreach($locales as $lang => $locale) {
                    TagLocalization::factory()->create([ 
                            'tag_id' => $tag->id,
                            'lang' => $lang,
                        ]);
                }
            });

        Project::factory()->count(6)->create()
            ->each(function($project) use ($locales, $technologies, $tags)
            {
                $project->addMediaFromUrl(url('/demo/projects/'. random_int(1, 4) . '.jpg'))->toMediaCollection('images');
                $project->technologies()->attach($technologies->random());
                $project->tag()->associate($tags->random());
                $project->save();

                foreach($locales as $lang => $locale) {
                    ProjectLocalization::factory()->create([ 
                            'project_id' => $project->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

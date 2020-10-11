<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Classes\EditingLocalization;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appUrl = 'http://127.0.0.1:8000';
        $locales = EditingLocalization::getSupportedLocales();
        
        $technology = \App\Models\Technology::factory()->count(3)->create()
            ->each(function($technology) use ($appUrl){
                $technology->addMediaFromUrl($appUrl . '/demo/technology/' . random_int(1, 3) . '.svg')->toMediaCollection('images');
            });

        $tag = \App\Models\Tag::factory()->count(3)->create()
            ->each(function($tag) use ($locales) {
                foreach($locales as $lang => $locale) {
                    \App\Models\TagLocalization::factory()->create([ 
                            'tag_id' => $tag->id,
                            'lang' => $lang,
                        ]);
                }
            });

        \App\Models\Project::factory()->count(5)->create(['tag_id' => $tag[random_int(0, sizeof($tag) - 1)]])
            ->each(function($project) use ($locales, $appUrl, $technology)
            {
                $project->addMediaFromUrl( $appUrl . '/demo/project.jpg')->toMediaCollection('images');
                $project->technologies()->attach($technology[random_int(0, sizeof($technology) - 1)]->id);

                foreach($locales as $lang => $locale) {
                    \App\Models\ProjectLocalization::factory()->create([ 
                            'project_id' => $project->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

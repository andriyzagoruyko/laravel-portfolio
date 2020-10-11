<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Classes\EditingLocalization;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appUrl = 'http://127.0.0.1:8000';
        $locales =  EditingLocalization::getSupportedLocales();

        \App\Models\Info::factory()->create()
            ->each(function($info) use ($locales, $appUrl)
            {
                $info->addMediaFromUrl( $appUrl . '/demo/man.png')->toMediaCollection('photo');

                foreach($locales as $lang => $locale) {
                    \App\Models\InfoLocalization::factory()->create([ 
                            'info_id' => $info->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

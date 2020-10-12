<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Classes\EditingLocalization;
use App\Models\Info;
use App\Models\InfoLocalization;



class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales =  EditingLocalization::getSupportedLocales();

        Info::factory()->create()
            ->each(function($info) use ($locales)
            {
                $info->addMediaFromUrl(url('/demo/man.png'))->toMediaCollection('photo');

                foreach($locales as $lang => $locale) {
                    InfoLocalization::factory()->create([ 
                            'info_id' => $info->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Classes\EditingLocalization;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales =  EditingLocalization::getSupportedLocales();

        \App\Models\Config::factory()->create()
            ->each(function($config) use ($locales)
            {
                foreach($locales as $lang => $locale) {
                    \App\Models\ConfigLocalization::factory()->create([ 
                            'config_id' => $config->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

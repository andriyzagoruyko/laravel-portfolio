<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Classes\EditingLocalization;
use App\Models\Config;
use App\Models\ConfigLocalization;



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

        Config::factory()->create()
            ->each(function($config) use ($locales)
            {
                foreach($locales as $lang => $locale) {
                    ConfigLocalization::factory()->create([ 
                            'config_id' => $config->id,
                            'lang' => $lang,
                        ]);
                }
            });
    }
}

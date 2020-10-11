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
        DB::table('configs')->insert(['id' => 1]);

        $locales =  EditingLocalization::getSupportedLocales();

        foreach($locales as $lang => $locale) {
            DB::table('config_localizations')->insert([
                'config_id' => 1,
                'lang' => $lang,
            ]);
        }    
    }
}

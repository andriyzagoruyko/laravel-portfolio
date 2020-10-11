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
        DB::table('infos')->insert(['id' => 1]);

        $locales =  EditingLocalization::getSupportedLocales();

        foreach($locales as $lang => $locale) {
            DB::table('info_localizations')->insert([
                'info_id' => 1,
                'lang' => $lang,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ConfigSite;
use Illuminate\Database\Seeder;

class ConfigSiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigSite::create([
            'color' => 'blue', #blue,blueviolet,goldenrod,green,magenta,orange,purple,red,yellow,yellowgreen
            'color_style' => 'light', #dark,light
            'layout_style' => 'wide', #wide, boxed
            'separator_style' => 'normal', #normal, skew, reversed-skew, double-diagonal, big-triangle
            'mainslider' => 'classicslider1' #classicslider1,classic-carousel2
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\AdminContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminContent::create([
            'page' => 'lookbook',
            'order' => 1,
            'title' => 'Título Aqui',
            'text' => 'Texto Aqui',
            'description' => null,
            'active' => 'yes'
        ]);
    }
}

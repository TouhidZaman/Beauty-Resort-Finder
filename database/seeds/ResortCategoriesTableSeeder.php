<?php

use Illuminate\Database\Seeder;
use App\ResortCategory;

class ResortCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResortCategory::truncate();

        ResortCategory::create([
            'category' => 'Five Star',
        ]);
        ResortCategory::create([
            'category' => 'Three Star',
        ]);
        ResortCategory::create([
            'category' => 'Normal',
        ]);
    }
}

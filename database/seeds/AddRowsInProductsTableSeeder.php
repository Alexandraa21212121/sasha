<?php

use Illuminate\Database\Seeder;

class AddRowsInProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [

        ];

        foreach($categories as $category){
            \App\models\Category::firstOrCreate($category);
        }
    }
}

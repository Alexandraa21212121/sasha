<?php

use Illuminate\Database\Seeder;

class AddRowsInCategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for ($i = 1;$i < 10;$i++){
//            \App\models\Category::create([
//                'name' => Str::random(10),
//                'sort_order' => $i,
//                'status' => true
//            ]);
//        }

        $categories = [
            [
                'id' => 1,
                'name' => 'Белье',
                'sort_order' => 1,
                'status' => true
            ],
            [
                'id' => 2,
                'name' => 'Купальники',
                'sort_order' => 1,
                'status' => true
            ],
            [
                'id' => 3,
                'name' => 'Шляпы',
                'sort_order' => 1,
                'status' => true
            ],
            [
                'id' => 4,
                'name' => 'Платья пляжные',
                'sort_order' => 1,
                'status' => true
            ]

        ];

        foreach($categories as $category){
            \App\models\Category::updateOrCreate(['id' => $category['id']],$category);
        }


    }
}

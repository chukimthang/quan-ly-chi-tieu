<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Thịt cá',
            'Rau, củ, quả',
            'Gia vị',
            'Đồ gia dụng',
            'Ăn vặt',
            'Tiền phạt',
            'Khác'
        ];

        for ($i = 0; $i < count($category); $i++) { 
            DB::table('categories')->insert([
                'name' => $category[$i]
            ]);
        }
    }
}

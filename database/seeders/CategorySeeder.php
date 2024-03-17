<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Tạo mảng dữ liệu do mình tự định nghĩa
        $categories = [
            [
                'name'=>'Điện thoại',
                'value'=>'1'
            ],
            [
                'name'=>'Laptop',
                'value'=>'2'
            ],
            [
                'name'=>'TV',
                'value'=>'3'
            ],
        ];

        foreach($categories as $item)
        {
            Category::create($item);
        }


    }
}
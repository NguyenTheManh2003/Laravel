<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = 100;

        // Tạo một đối tượng Faker
        $faker = Faker::create();

        // Lấy danh sách ID danh mục
        $cate_ids = DB::table('categories')->pluck('id')->toArray();

        for ($i = 0; $i < $limit; $i++) {
            // Kiểm tra xem có ID danh mục nào khả dụng không
            if (!empty($cate_ids)) {
                $product = [
                    'code' => $faker->numerify('300-####-###'),
                    'name' => $faker->name,
                    'price' => $faker->numerify('####'),
                    'cate_id' => $faker->randomElement($cate_ids),
                    'url_image' => $faker->imageUrl($width = 400, $height = 400),
                    'description' => $faker->paragraph(3),
                ];

                // Chèn dữ liệu vào cơ sở dữ liệu
                Product::create($product);
            } else {
                // Ghi log một thông báo hoặc xử lý trường hợp không có ID danh mục khả dụng
                // Điều này là để ngăn 'cate_id' trở thành null
                // Bạn có thể điều chỉnh phần này dựa trên nhu cầu của bạn
                echo "Không có ID danh mục khả dụng.";
                break;
            }
        }
    }
}
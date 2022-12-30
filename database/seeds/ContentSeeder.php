<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'image' => 'products/iphone_x.jpg'
            ],
            [
                'image' => 'products/iphone_x_silver.jpg'
            ],
            [
                'image' => 'products/htc_one_s.png'
            ],
            [
                'image' => 'products/iphone_5.jpg'
            ],
            [
                'image' => 'products/samsung_j6.jpg'
            ],
            [
                'image' => 'products/beats.jpg'
            ],
            [
                'image' => 'products/gopro.jpg'
            ],
            [
                'image' => 'products/video_panasonic.jpg'
            ],
            [
                'image' => 'products/delongi.jpg'
            ],
            [
                'image' => 'products/haier.jpg'
            ],
            [
                'image' => 'products/moulinex.jpg'
            ],
            [
                'image' => 'products/bosch.jpg'
            ],
        ];

        $imageIds = [];
        foreach ($images as $image) {
            $image['created_at'] = Carbon::now();
            $image['updated_at'] = Carbon::now();
            array_push($imageIds, DB::table('images')->insertGetId($image));
        }


        $products = [
            [
                'name' => 'iPhone X 32гб',
                'code' => 'iphone_x',
                'description' => 'Отличный продвинутый телефон',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 1
            ],
            [
                'name' => 'iPhone XL',
                'code' => 'iphone_xl',
                'description' => 'Огромный продвинутый телефон',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 2
            ],
            [
                'name' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 3
            ],
            [
                'name' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 4
            ],
            [
                'name' => 'Samsung Galaxy J6',
                'code' => 'samsung_j6',
                'description' => 'Современный телефон начального уровня',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 5
            ],
            [
                'name' => 'Наушники Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Отличный звук от Dr. Dre',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 6
            ],
            [
                'name' => 'Камера GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 7
            ],
            [
                'name' => 'Камера Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 8
            ],
            [
                'name' => 'Кофемашина DeLongi',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 9
            ],
            [
                'name' => 'Холодильник Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 10
            ],
            [
                'name' => 'Блендер Moulinex',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 11
            ],
            [
                'name' => 'Мясорубка Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'count' => rand(0, 30),
                'price' => rand(5000, 100000),
                'image' => 12
            ],
        ];

        $productIds = [];
        foreach ($products as $product) {
            $product['created_at'] = Carbon::now();
            $product['updated_at'] = Carbon::now();
            $imageId = $product['image'];
            unset($product['image']);

            $productId = DB::table('products')->insertGetId($product);
            array_push($productIds, $productId);

            for ($i=0; $i <= 3; $i++) {
                $product_image['product_id'] = $productId;
                $product_image['image_id'] = $imageId; 
                DB::table('image_product')->insertGetId($product_image);
            }
        }


        $categories = [
            [
                'name' => 'Мобильные телефоны',
                'code' => 'mobiles',
                'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
                'image' => 'categories/mobile.jpg',
                'products' => [1,2,3,4,5]
            ],
            [
                'name' => 'Портативная техника',
                'code' => 'portable',
                'description' => 'Раздел с портативной техникой.',
                'image' => 'categories/portable.jpg',
                'products' => [6,7,8,3,4]
            ],
            [
                'name' => 'Бытовая техника',
                'code' => 'appliances',
                'description' => 'Раздел с бытовой техникой',
                'image' => 'categories/appliance.jpg',
                'products' => [9,10,11,12,2,5]
            ]
        ];

        $categoryIds = [];
        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            $products = $category['products'];
            unset($category['products']);

            $categoryId = DB::table('categories')->insertGetId($category);
            array_push($categoryIds, $categoryId);

            foreach ($products as $product) {
                $product_category['created_at'] = Carbon::now();
                $product_category['updated_at'] = Carbon::now();
                $product_category['product_id'] = $product;
                $product_category['category_id'] = $categoryId;
                $product_categoryId = DB::table('category_product')->insertGetId($product_category);    
            }            
        }
    }
}

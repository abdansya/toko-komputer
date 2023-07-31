<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Macbook Pro',
            'Macbook Air',
            'Asus ROG',
            'MSI Gaming',
            'Hardisk External',
            'Hardisk Internal',
            'Mouse Logitetch',
            'Keyboard Plus',
            'Meja Kera',
            'CPU Core I7',
            'Kipas Laptop',
            'Power Supplay',
            'Monitor Gaming',
            'Headphone'
        ];
        $categories = [
            'Laptop',
            'Aksesoris',
            'Elektronik'
        ];

        for ($i=0; $i < count($names); $i++) {
            $price = rand(11, 30) * 1000000;
            DB::table('products')->insert([
                'code' => 'PRD00'.$i,
                'name' => $names[$i],
                'image' => 'images/macbook.jpg',
                'purchase_price' => $price,
                'sale_price' => $price + 1000000,
                'stock' => rand(5,30),
                'category' => $categories[rand(0,2)],
                'created_at' => '2023-07-'.$i+1,
                'updated_at' => '2023-07-'.$i+1
            ]);
        }
    }
}

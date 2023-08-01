<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::factory(25)->create();
        
        $products = Product::all();
        $lastProduct = 0;
        foreach ($orders as $order) {
            $totalPriceOrder = 0;
            $createdAt = Carbon::now()->addDays(rand(1,8))->format('Y-m-d H:i:s');
            for ($i=0; $i < rand(2,5); $i++) {
                $qty = rand(4,8);
                $salePrice = $products[$lastProduct]->sale_price;
                $totalPrice = $qty * $salePrice;
                $totalPriceOrder += $totalPrice;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $products[$lastProduct]->id,
                    'product_code' => $products[$lastProduct]->code,
                    'product_name' => $products[$lastProduct]->name,
                    'quantity' => $qty,
                    'purchase_price' => $products[$lastProduct]->purchase_price,
                    'sale_price' => $salePrice,
                    'total_price' => $totalPrice,
                    'created_at' => $createdAt
                ]);
    
                $lastProduct ++;
                if ($lastProduct == $products->count()) {
                    $lastProduct = 0;
                }
            }

            $order->update([
                'total' => $totalPriceOrder,
                'created_at' => $createdAt,
            ]);
            
            $totalPriceOrder = 0;
        }
    }
}

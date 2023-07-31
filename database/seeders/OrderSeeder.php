<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
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
            for ($i=0; $i < rand(2,5); $i++) {
                $qty = rand(1,3);
                $unitPrice = $products[$lastProduct]->sale_price;
                $totalPrice = $qty * $unitPrice;
                $totalPriceOrder += $totalPrice;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $products[$lastProduct]->id,
                    'product_code' => $products[$lastProduct]->code,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);
    
                $lastProduct ++;
                if ($lastProduct == $products->count()) {
                    $lastProduct = 0;
                }
            }

            $order->update(['total' => $totalPriceOrder]);
            
            $totalPriceOrder = 0;
        }
    }
}

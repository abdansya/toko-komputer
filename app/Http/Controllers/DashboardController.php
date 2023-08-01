<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = Carbon::today()->startOfMonth()->format('Y-m-d H:i:s');
        $endDate = Carbon::today()->endOfMonth()->format('Y-m-d H:i:s');

        DB::enableQueryLog();
        $data['activeMenu'] = 'dashboard';

        $orderDetailCategories = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->selectRaw('products.category, cast(sum(quantity) as unsigned) as total_quantity')
            ->whereBetween('order_details.created_at', [$startDate, $endDate])
            ->groupBy('products.category')
            ->get();

        $data['orderDetails'] = OrderDetail::selectRaw('product_code, product_name, DATE_FORMAT(created_at, "%Y-%m-%d") date, cast(sum(quantity) as unsigned) as total_quantity')
                                            ->whereBetween('created_at', [$startDate, $endDate])
                                            ->groupBy('product_code', 'product_name', 'date')
                                            ->orderBy('date', 'asc')
                                            ->get();
        $data['lastOrders'] = Order::select('customer_name', 'customer_address', 'created_at', 'total')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(10)
                                    ->get();

        $data['dates'] = array_values($data['orderDetails']->pluck('date')->unique()->toArray());
        $data['datasets'] = $this->datasets($data['orderDetails'], $data['dates']);
        $data['labelPie'] = $orderDetailCategories->pluck('category')->toArray();
        $data['datasetsPie'] = $orderDetailCategories->pluck('total_quantity')->toArray();
        // dd($data);

        return view('dashboard.index', $data);
    }

    private function datesInMonth() : array {
        $dates = [];
        $lastDay = Carbon::now()->daysInMonth;

        for ($i=1; $i <= $lastDay ; $i++) {
            array_push($dates, Carbon::today()->startOfMonth()->addDays($i)->format('Y-m-d'));
        }

        return $dates;
    }

    private function datasets($orderDetails, $dates) : array {
        $productCodes = $orderDetails->pluck('product_code')->unique();
        $datasets = [];
        $dates = array_map(function($val) { return 0; }, array_flip($dates));

        foreach ($productCodes as $productCode) {
            $orderDetailByProduct = $orderDetails->where('product_code', $productCode);
            $mapDateQuantity = $orderDetailByProduct->pluck('total_quantity', 'date')->toArray();
            $mapDateQuantity = array_merge($dates, $mapDateQuantity);
            $productName = $orderDetailByProduct->first()->product_name;
            $dataProduct = [
                'label' => $productName,
                'data' => $mapDateQuantity
            ];
            $orderDetails->where('name', $productName)->pluck('quantity');

            array_push($datasets, $dataProduct);
        }

        return $datasets;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

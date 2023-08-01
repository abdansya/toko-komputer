<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['activeMenu'] = 'order';
        $data['orders'] = Order::with('orderDetails')->paginate(10);

        return view('order.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['order'] = Order::with('orderDetails')->find($id);

        return view('order.show', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\medicines;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::latest()->get();
        return view('Admin.orders.orders', compact('orders'));
    }
    // View Single Order Detail
    public function show($id)
    {
        $order = Orders::with('orderitems.product', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products =medicines::all();
        return view ('Admin.orders.AddOrders',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

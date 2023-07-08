<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::all();
        return view('purchase_orders.index', compact('orders'));
    }

    public function create()
    {
        // Show create form
    }

    public function store(Request $request)
    {
        // Validate and store the purchase order
    }

    public function show($id)
    {
        $order = PurchaseOrder::findOrFail($id);
        return view('purchase_orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = PurchaseOrder::findOrFail($id);
        return view('purchase_orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the purchase order
    }

    public function destroy($id)
    {
        $order = PurchaseOrder::findOrFail($id);
        $order->delete();
        return redirect()->route('purchase_orders.index');
    }
}

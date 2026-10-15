<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Customer;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['customer', 'category']);

        // Filter by start date
        if ($request->filled('from')) {
            $query->whereDate('order_date', '>=', $request->from);
        }

        // Filter by end date
        if ($request->filled('to')) {
            $query->whereDate('order_date', '<=', $request->to);
        }

        // Filter by customer ID
        if ($request->filled('customer_id')) {
            $query->where('customer_id', $request->customer_id);
        }

        // Filter by category ID
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Show today's orders by default when no filters are provided
        if (!$request->hasAny([
            'from',
            'to',
            'customer_id',
            'category_id',
        ])) {
            $query->whereDate('order_date','>=', '1999-12-31');  
        }

        $orders = $query
            ->orderByDesc('order_date')
            ->orderByDesc('order_id')
            ->paginate(10);

        $categories = Category::orderBy('category_name')->get();

        return view('orders.index', compact('orders', 'categories'));
    }
    public function create()
{
    $customers = Customer::orderBy('first_name')
        ->orderBy('last_name')
        ->get();

    $categories = Category::orderBy('category_name')->get();

    return view('orders.create', compact('customers', 'categories'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'customer_id' => ['required', 'integer', 'exists:customers,customer_id'],
        'category_id' => ['required', 'integer', 'exists:categories,category_id'],
        'order_date' => ['required', 'date'],
        'total_amount' => ['required', 'numeric', 'min:0'],
        'status' => ['required', 'in:Pending,Processing,Shipped,Delivered,Cancelled'],
    ]);

    Order::create($validated);

    return redirect()
        ->route('orders.index')
        ->with('success', 'Order created successfully.');
}


public function show(Order $order)
{
    $order->load(['customer', 'category']);

    return view('orders.show', compact('order'));
}


public function edit(Order $order)
{
    $customers = Customer::orderBy('first_name')
        ->orderBy('last_name')
        ->get();

    $categories = Category::orderBy('category_name')->get();

    return view('orders.edit', compact(
        'order',
        'customers',
        'categories'
    ));
}

public function update(Request $request, Order $order)
{
    $validated = $request->validate([
        'customer_id' => ['required', 'integer', 'exists:customers,customer_id'],
        'category_id' => ['required', 'integer', 'exists:categories,category_id'],
        'order_date' => ['required', 'date'],
        'total_amount' => ['required', 'numeric', 'min:0'],
        'status' => ['required', 'in:Pending,Processing,Shipped,Delivered,Cancelled'],
    ]);

    $order->update($validated);

    return redirect()
        ->route('orders.show', $order->order_id)
        ->with('success', 'Order updated successfully.');
}


public function destroy(Order $order)
{
    $order->delete();

    return redirect()
        ->route('orders.index')
        ->with('success', 'Order deleted successfully.');
}

}

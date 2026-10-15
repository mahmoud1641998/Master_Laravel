@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Orders Management</h2>

    <a href="{{ route('orders.create') }}" class="btn btn-primary">
        + Add Order
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('orders.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="from" class="form-label">From Date</label>
                    <input type="date" id="from" name="from"
                        class="form-control" value="{{ request('from') }}">
                </div>

                <div class="col-md-3">
                    <label for="to" class="form-label">To Date</label>
                    <input type="date" id="to" name="to"
                        class="form-control" value="{{ request('to') }}">
                </div>

                <div class="col-md-3">
                    <label for="customer_id" class="form-label">Customer ID</label>
                    <input type="number" id="customer_id" name="customer_id"
                        class="form-control" min="1"
                        value="{{ request('customer_id') }}">
                </div>

                <div class="col-md-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"
                                @selected(request('category_id') == $category->category_id)>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-dark">Apply Filters</button>
                    <a href="{{ route('orders.index') }}"
                        class="btn btn-outline-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Category</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>
                                {{ $order->customer->first_name }}
                                {{ $order->customer->last_name }}
                                <small class="text-muted d-block">
                                    ID: {{ $order->customer_id }}
                                </small>
                            </td>
                            <td>{{ $order->category->category_name }}</td>
                            <td>{{ $order->order_date?->format('Y-m-d') }}</td>
                            <td>{{ number_format((float) $order->total_amount, 2) }}</td>
                            <td>
                                @php
                                    $statusClass = match ($order->status) {
                                        'Pending' => 'bg-warning text-dark',
                                        'Processing' => 'bg-info text-dark',
                                        'Shipped' => 'bg-primary',
                                        'Delivered' => 'bg-success',
                                        'Cancelled' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp

                                <span class="badge {{ $statusClass }}">
                                    {{ $order->status ?? 'Unknown' }}
                                </span>
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ route('orders.show', $order->order_id) }}"
                                    class="btn btn-info btn-sm">View</a>

                                <a href="{{ route('orders.edit', $order->order_id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('orders.destroy', $order->order_id) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No orders found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

         {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Order #{{ $order->order_id }}</h2>

    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
        Back to Orders
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Order Information</h5>
    </div>

    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <p class="text-muted mb-1">Order ID</p>
                <h6>{{ $order->order_id }}</h6>
            </div>

            <div class="col-md-6">
                <p class="text-muted mb-1">Order Date</p>
                <h6>{{ $order->order_date?->format('Y-m-d') }}</h6>
            </div>

            <div class="col-md-6">
                <p class="text-muted mb-1">Customer</p>
                <h6>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</h6>
                <small class="text-muted">Customer ID: {{ $order->customer_id }}</small>
            </div>

            <div class="col-md-6">
                <p class="text-muted mb-1">Category</p>
                <h6>{{ $order->category->category_name }}</h6>
                <small class="text-muted">Category ID: {{ $order->category_id }}</small>
            </div>

            <div class="col-md-6">
                <p class="text-muted mb-1">Total Amount</p>
                <h4 class="text-primary">
                    {{ number_format((float) $order->total_amount, 2) }}
                </h4>
            </div>

            <div class="col-md-6">
                <p class="text-muted mb-1">Status</p>

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
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex gap-2">
            <a href="{{ route('orders.edit', $order->order_id) }}"
                class="btn btn-warning">Edit Order</a>

            <a href="{{ route('orders.index') }}"
                class="btn btn-secondary">Back to Orders</a>
        </div>
    </div>
</div>
@endsection

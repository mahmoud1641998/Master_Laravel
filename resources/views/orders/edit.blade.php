@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit Order #{{ $order->order_id }}</h2>

    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
        Back to Orders
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('orders.update', $order->order_id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('orders._form')
        </form>
    </div>
</div>
@endsection

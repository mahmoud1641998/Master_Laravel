@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Customer Details</h2>

    <div>
        <a href="{{ route('customers.edit', $customer->customer_id) }}"
           class="btn btn-primary">Edit Customer</a>

        <a href="{{ route('customers.index') }}"
           class="btn btn-outline-secondary">Back to Customers</a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <p>
            <strong>Customer ID:</strong>
            {{ $customer->customer_id }}
        </p>

        <p>
            <strong>Full Name:</strong>
            {{ $customer->first_name }} {{ $customer->last_name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $customer->email }}
        </p>

        <p>
            <strong>Phone:</strong>
            {{ $customer->phone ?? 'N/A' }}
        </p>

        <p class="mb-0">
            <strong>City:</strong>
            {{ $customer->city ?? 'N/A' }}
        </p>
    </div>
</div>
@endsection

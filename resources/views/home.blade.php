@extends('layouts.app')

@section('title', 'Home - E-Commerce System')

@section('content')

<div class="container py-4">

    <div class="row align-items-center g-5">

        {{-- Welcome Content --}}
        <div class="col-lg-6">

            <span class="badge bg-primary mb-3">
                E-Commerce Management
            </span>

            <h1 class="display-5 fw-bold mb-3">
                Manage Your Business
                <span class="text-primary">Smarter.</span>
            </h1>

            <p class="lead text-secondary mb-4">
                Welcome to your E-Commerce Management System.
                Manage orders, customers, and product categories
                through one simple and organized platform.
            </p>

            <div class="d-flex flex-wrap gap-2">

                <a href="{{ route('orders.index') }}"
                   class="btn btn-primary btn-lg">
                    Manage Orders
                </a>

                <a href="{{ route('customers.index') }}"
                   class="btn btn-outline-secondary btn-lg">
                    View Customers
                </a>

            </div>

        </div>

        {{-- Hero Image --}}
        <div class="col-lg-6">

            <img
                src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1000&q=80"
                alt="Online shopping and payment"
                class="img-fluid rounded-4 shadow"
            >

        </div>

    </div>

    {{-- Features --}}
    <div class="row g-4 mt-5">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Orders</h5>
                    <p class="text-secondary mb-0">
                        Create, track, update, and manage customer orders.
                    </p>
                    <a href="{{ route('orders.index') }}"
                       class="btn btn-outline-primary btn-sm mt-3">
                        Explore Orders →
                    </a>    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Customers</h5>
                    <p class="text-secondary mb-0">
                        Organize customer information and contact details.
                    </p>
                    <a href="{{ route('customers.index') }}"
                       class="btn btn-outline-primary btn-sm mt-3">
                        Explore Customers →
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold">Categories</h5>
                    <p class="text-secondary mb-0">
                        Keep your product categories organized.
                    </p>
                    <a href="{{ route('categories.index') }}"
                       class="btn btn-outline-primary btn-sm mt-3">
                        Explore Categories →
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

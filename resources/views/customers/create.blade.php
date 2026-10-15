
@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
<h2 class="mb-4">Add Customer</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            @include('customers._form')
        </form>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<h2 class="mb-4">Edit Customer</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            @include('customers._form')
        </form>
    </div>
</div>
@endsection

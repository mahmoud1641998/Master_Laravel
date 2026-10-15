
@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<h2 class="mb-4">Add Category</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('categories._form')
        </form>
    </div>
</div>
@endsection

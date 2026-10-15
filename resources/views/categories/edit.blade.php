
@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<h2 class="mb-4">Edit Category</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            @include('categories._form')
        </form>
    </div>
</div>
@endsection

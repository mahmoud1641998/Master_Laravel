@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Category Details</h2>

    <div>
        <a href="{{ route('categories.edit', $category->category_id) }}"
           class="btn btn-warning">
            Edit Category
        </a>

        <a href="{{ route('categories.index') }}"
           class="btn btn-outline-secondary">
            Back to Categories
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <div class="mb-3">
            <strong>Category ID:</strong>
            {{ $category->category_id }}
        </div>

        <div class="mb-3">
            <strong>Category Name:</strong>
            {{ $category->category_name }}
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            {{ $category->description ?? 'N/A' }}
        </div>
    </div>
</div>
@endsection

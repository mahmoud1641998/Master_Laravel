
@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h2>Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        + Add Category
    </a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('categories.edit', $category) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('categories.destroy', $category) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No categories found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
</div>
@endsection

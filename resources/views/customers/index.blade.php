
@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h2>Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">
        + Add Customer
    </a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('customers.edit', $customer) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('customers.destroy', $customer) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this customer?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $customers->links() }}
    </div>
</div>
@endsection

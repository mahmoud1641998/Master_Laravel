@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
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
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_id }}</td>

                        <td>
                            {{ $customer->first_name }}
                            {{ $customer->last_name }}
                        </td>

                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone ?? 'N/A' }}</td>
                        <td>{{ $customer->city ?? 'N/A' }}</td>

                        <td class="text-nowrap">
                            <a href="{{ route('customers.show', $customer->customer_id) }}"
                               class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('customers.edit', $customer->customer_id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('customers.destroy', $customer->customer_id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this customer?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No customers found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $customers->links() }}
    </div>
</div>
@endsection

<div class="mb-3">
    <label for="customer_id" class="form-label">Customer</label>

    <select name="customer_id" id="customer_id"
        class="form-select @error('customer_id') is-invalid @enderror" required>
        <option value="">Select Customer</option>

        @foreach($customers as $customer)
            <option value="{{ $customer->customer_id }}"
                @selected(old('customer_id', $order->customer_id ?? '') == $customer->customer_id)>
                {{ $customer->first_name }} {{ $customer->last_name }}
                (ID: {{ $customer->customer_id }})
            </option>
        @endforeach
    </select>

    @error('customer_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>

    <select name="category_id" id="category_id"
        class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">Select Category</option>

        @foreach($categories as $category)
            <option value="{{ $category->category_id }}"
                @selected(old('category_id', $order->category_id ?? '') == $category->category_id)>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="order_date" class="form-label">Order Date</label>

    <input type="date" name="order_date" id="order_date"
        class="form-control @error('order_date') is-invalid @enderror"
        value="{{ old('order_date', isset($order) && $order->order_date ? $order->order_date->format('Y-m-d') : now()->toDateString()) }}"
        required>

    @error('order_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="total_amount" class="form-label">Total Amount</label>

    <input type="number" name="total_amount" id="total_amount"
        class="form-control @error('total_amount') is-invalid @enderror"
        min="0" step="0.01"
        value="{{ old('total_amount', $order->total_amount ?? '') }}"
        required>

    @error('total_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>

    <select name="status" id="status"
        class="form-select @error('status') is-invalid @enderror">
        @foreach(['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'] as $status)
            <option value="{{ $status }}"
                @selected(old('status', $order->status ?? 'Pending') === $status)>
                {{ $status }}
            </option>
        @endforeach
    </select>

    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Save Order</button>
<a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>


<div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" class="form-control"
           value="{{ old('name', $customer->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $customer->email ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input name="phone" class="form-control"
           value="{{ old('phone', $customer->phone ?? '') }}">
</div>

<button class="btn btn-primary">Save Customer</button>
<a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>

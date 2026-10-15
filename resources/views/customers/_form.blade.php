<div class="mb-3">
    <label class="form-label">First Name</label>
    <input type="text"
           name="first_name"
           class="form-control"
           value="{{ old('first_name', $customer->first_name ?? '') }}"
           maxlength="50"
           required>
    @error('first_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Last Name</label>
    <input type="text"
           name="last_name"
           class="form-control"
           value="{{ old('last_name', $customer->last_name ?? '') }}"
           maxlength="50"
           required>
    @error('last_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email"
           name="email"
           class="form-control"
           value="{{ old('email', $customer->email ?? '') }}"
           maxlength="100"
           required>
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text"
           name="phone"
           class="form-control"
           value="{{ old('phone', $customer->phone ?? '') }}">
    @error('phone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">City</label>
    <input type="text"
           name="city"
           class="form-control"
           value="{{ old('city', $customer->city ?? '') }}">
    @error('city')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Save Customer</button>
<a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>

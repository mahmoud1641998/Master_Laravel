<div class="mb-3">
    <label class="form-label">Category Name</label>

    <input type="text"
           name="category_name"
           class="form-control"
           value="{{ old('category_name', $category->category_name ?? '') }}"
           maxlength="100"
           required>

    @error('category_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea name="description"
              class="form-control"
              rows="3">{{ old('description', $category->description ?? '') }}</textarea>

    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Save Category</button>

<a href="{{ route('categories.index') }}" class="btn btn-secondary">
    Cancel
</a>

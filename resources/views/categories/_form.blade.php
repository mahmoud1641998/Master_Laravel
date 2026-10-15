
<div class="mb-3">
    <label class="form-label">Category Name</label>
    <input name="name" class="form-control"
           value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<button class="btn btn-primary">Save Category</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>

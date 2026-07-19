<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select" required>
        <option value="">Select category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Price (৳)</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Discount Price (৳)</label>
        <input type="number" step="0.01" name="discount_price" class="form-control" value="{{ old('discount_price', $product->discount_price ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control" accept="image/*">
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active (visible in store)</label>
</div>

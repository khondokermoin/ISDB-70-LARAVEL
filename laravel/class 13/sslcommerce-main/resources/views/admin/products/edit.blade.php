@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<h3 class="mb-4">Edit Product</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.products._form')
            <button class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>
@endsection

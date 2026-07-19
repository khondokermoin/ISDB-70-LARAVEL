@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
<h3 class="mb-4">Add New Product</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form')
            <button class="btn btn-primary">Save Product</button>
        </form>
    </div>
</div>
@endsection

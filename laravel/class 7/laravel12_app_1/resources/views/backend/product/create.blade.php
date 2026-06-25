@extends('backend.master')
@section('content')
    <main class="page-content">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-4">
                                <h5 class="mb-3">Product Name</h5>
                                <input type="text" name="name" class="form-control"
                                    placeholder="write title here....">
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-3">Product Description</h5>
                                <textarea class="form-control" name="description" cols="4" rows="6"
                                    placeholder="write a description here.."></textarea>
                            </div>

                            <div class="mb-4">
                                <h5 class="mb-3">Display images</h5>
                                <input id="fancy-file-upload" type="file" name="image"
                                    accept=".jpg, .png, image/jpeg, image/png" multiple>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <!-- Added w-100 class here -->
                                <button type="submit" class="btn btn-success px-4 w-100">+ Save Draft</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Organize</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="AddCategory" class="form-label fw-bold">Category</label>
                                    <!-- FIXED: Added name="category" so the value is sent to the backend -->
                                    <select class="form-select" id="AddCategory" name="category_id">
                                        <option value="">Slect One</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->cat_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="Price" class="form-label fw-bold">Price</label>
                                    <input type="text" name="price" class="form-control" id="Price"
                                        placeholder="Price">
                                </div>
                                <div class="col-12">
                                    <!-- Removed for="Price" since this is a group label, not tied to a specific input -->
                                    <label class="form-label fw-bold">Product Status</label>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <!-- Changed to type="radio", added name="product_status", changed id and value -->
                                            <input class="form-check-input" type="radio" name="status" id="statusInStock"
                                                value="1" checked>
                                            <label class="form-check-label" for="statusInStock">In Stock</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <!-- Changed to type="radio", added name="product_status", changed id and value -->
                                            <input class="form-check-input" type="radio" name="status"
                                                id="statusOutStock" value="0">
                                            <label class="form-check-label" for="statusOutStock">Out of Stock</label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>



                </div>

            </div><!--end row-->
        </form>
    </main>
@endsection

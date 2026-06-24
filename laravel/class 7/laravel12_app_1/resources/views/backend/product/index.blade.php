@extends('backend.master')

@push('styles')
    <link href="{{ asset('') }}assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('') }}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    {{-- নিচের লাইনটি আনকমেন্ট করা হলো, কারণ Bootstrap 5 স্টাইলের জন্য এটি প্রয়োজন --}}
    <script src="{{ asset('') }}assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush

@section('content')
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Products</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add New Product</a>
            </div>
        </div>
        <!--end breadcrumb-->

        {{-- Success Message Show করার জন্য --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h6 class="mb-0 text-uppercase">Product List</h6>
        <hr>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img class="img-thumbnail" style="width: 50px"
                                                src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                                        @else
                                            <img class="img-thumbnail" style="width: 50px"
                                                src="{{ asset('assets/images/demo.jpg') }}" alt="No Image">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->cat_name ?? 'N/A' }}</td>
                                    <td>৳ {{ number_format($item->price, 2) }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">In Stock</span>
                                        @else
                                            <span class="badge bg-danger">Out of Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning text-white">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>

                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bx bx-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </main>
@endsection

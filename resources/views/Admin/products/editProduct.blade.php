@extends('app')
@section('page_title', 'Edit Product')

@section('content')
    <div class="container-fluid py-3">
        <div class="card">
            <div class="card-header">
                <h5>Edit Product</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('products.updateproduct', $product->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        @if ($product->image)
                            <img src="{{ asset('uploads/' . $product->image) }}" width="80" height="80"
                                class="d-block mb-2">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Full Price</label>
                        <input type="number" name="full_price" class="form-control" value="{{ $product->full_price }}">
                    </div>

                    <div class="mb-3">
                        <label>Original Price</label>
                        <input type="number" name="original_price" class="form-control"
                            value="{{ $product->original_price }}">
                    </div>

                    <div class="mb-3">
                        <label>Short Description</label>
                        <input type="text" name="short_description" class="form-control"
                            value="{{ $product->short_description }}">
                    </div>

                    <div class="mb-3">
                        <label>SKU</label>
                        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                    </div>

                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" name="brand" class="form-control" value="{{ $product->brand }}">
                    </div>

                    <div class="mb-3">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control">{{ $product->long_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Weight</label>
                        <input type="text" name="weight" class="form-control" value="{{ $product->weight }}">
                    </div>

                    <div class="mb-3">
                        <label>Dimension</label>
                        <input type="text" name="dimension" class="form-control" value="{{ $product->dimension }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update Product</button>
                    <a href="{{ route('products.product') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        </script>
    @endif


@endsection

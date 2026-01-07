@extends('app')
@section('page_title', 'AddProducts')

@section('content')
    <div class="container-fluid py-1">

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <h5 class="font-weight-bolder mb-0">Add a new Product</h5>

                            <a href="{{ route('products.product') }}" class="btn btn-primary btn-sm ms-auto mb-0">
                                Back to Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.storeproduct') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-sm">Product Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter product name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-sm">SKU <span class="text-danger">*</span></label>
                                    <input type="text" name="sku"
                                        class="form-control @error('sku') is-invalid @enderror" placeholder="SKU code"
                                        value="{{ old('sku') }}">
                                    @error('sku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Full Price <span class="text-danger">*</span></label>
                                    <input type="number" name="full_price"
                                        class="form-control @error('full_price') is-invalid @enderror" placeholder="Rs. 0"
                                        value="{{ old('full_price') }}">
                                    @error('full_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Original Price <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="original_price"
                                        class="form-control @error('original_price') is-invalid @enderror"
                                        placeholder="Rs. 0" value="{{ old('original_price') }}">
                                    @error('original_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-sm">Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="2">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Brand <span class="text-danger">*</span></label>
                                    <input type="text" name="brand"
                                        class="form-control @error('brand') is-invalid @enderror" placeholder="Brand name"
                                        value="{{ old('brand') }}">
                                    @error('brand')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Weight <span class="text-danger">*</span></label>
                                    <input type="text" name="weight"
                                        class="form-control @error('weight') is-invalid @enderror" placeholder="e.g. 500g"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-sm">Dimensions <span class="text-danger">*</span></label>
                                    <input type="text" name="dimension"
                                        class="form-control @error('dimension') is-invalid @enderror"
                                        placeholder="e.g. 23 × 40 × 35 cm" value="{{ old('dimension') }}">
                                    @error('dimension')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label text-sm">Product Image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-sm">Long Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="long_description" id="summernote" class="form-control @error('long_description') is-invalid @enderror">{{ old('long_description') }}</textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        Save Product
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Usman Qasim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Usman</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>



@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#summernote').summernote({
                height: 180,
                placeholder: 'Write detailed blog description here...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endsection

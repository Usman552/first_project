@extends('app')
@section('page_title', 'Add Medicine')

@section('content')
    <div class="container-fluid py-1">

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <h5 class="font-weight-bolder mb-0">Add a New Medicine</h5>
                        <a href="{{ route('products.product') }}" class="btn btn-primary btn-sm ms-auto mb-0">Back to
                            Products</a>
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
                                <!-- Medicine Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-sm">Medicine Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter medicine name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Company -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-sm">Company <span class="text-danger">*</span></label>
                                    <input type="text" name="company"
                                        class="form-control @error('company') is-invalid @enderror"
                                        placeholder="Enter company name" value="{{ old('company') }}">
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Strength -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Strength <span class="text-danger">*</span></label>
                                    <input type="text" name="strength"
                                        class="form-control @error('strength') is-invalid @enderror"
                                        placeholder="e.g. 500mg" value="{{ old('strength') }}">
                                    @error('strength')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Type <span class="text-danger">*</span></label>
                                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        <option value="Tablet" {{ old('type') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                                        <option value="Syrup" {{ old('type') == 'Syrup' ? 'selected' : '' }}>Syrup</option>
                                        <option value="Capsule" {{ old('type') == 'Capsule' ? 'selected' : '' }}>Capsule
                                        </option>
                                        <option value="Injection" {{ old('type') == 'Injection' ? 'selected' : '' }}>
                                            Injection</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Price <span class="text-danger">*</span></label>
                                    <input type="number" name="price"
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Rs. 0"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        placeholder="Stock quantity" value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Batch No -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Batch No <span class="text-danger">*</span></label>
                                    <input type="text" name="batch_no"
                                        class="form-control @error('batch_no') is-invalid @enderror"
                                        placeholder="Enter batch number" value="{{ old('batch_no') }}">
                                    @error('batch_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Expiry Date -->
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-sm">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" name="expiry_date"
                                        class="form-control @error('expiry_date') is-invalid @enderror"
                                        value="{{ old('expiry_date') }}">
                                    @error('expiry_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label text-sm">Medicine Image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save Medicine</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

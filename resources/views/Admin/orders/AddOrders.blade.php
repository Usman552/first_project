@extends('app')
@section('tilte', 'AddOrder')

@section('content')
    <div class="container my-3">

        <div class="card shadow">
            <div class="card-header text-dark">
                <h4>Create Order</h4>
            </div>

            <div class="card-body">

                <form action="/orders/store" method="POST">

                    <!-- Customer Name -->
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" placeholder="Enter customer name"
                            required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                    </div>

                    <!-- City -->
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter city">
                    </div>

                    <!-- Shipping Address -->
                    <div class="mb-3">
                        <label class="form-label">Shipping Address</label>
                        <textarea name="shipping_address" class="form-control" rows="3" placeholder="Enter shipping address"></textarea>
                    </div>

                    <!-- Product Dropdown -->
                    <div class="mb-3">
                        <label class="form-label">Select Product</label>
                        <select name="product_id" class="form-select">
                            <option value="">Select Product</option>
                            @foreach ($products as $pro)
                                <option value="{{ $pro->id }}">
                                    {{ $pro->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label class="form-label">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="1"
                            placeholder="Enter quantity">
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-success">
                        Save Order
                    </button>

                </form>

            </div>
        </div>

    </div>


@endsection

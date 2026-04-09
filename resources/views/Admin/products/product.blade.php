@extends('app')
@section('page_title', 'Medicines')

@section('content')
    <div class="container-fluid py-1">

        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between">
                        <h5 class="font-weight-bolder mb-0 text-start">All Medicines</h5>
                        <div class="ms-auto">
                            <a href="{{ route('products.addproduct') }}" class="btn btn-primary btn-sm mb-0">
                                <i class="fa-solid fa-plus"></i> Add Medicine
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="card p-0" style="height: 500px;">
                    <div class="card-header pb-0">
                        <h6>Medicine Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="height: 430px; overflow-y: auto;">
                        <div class="table-responsive p-0">
                            <table id="medicineTable" class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Company</th>
                                        <th class="text-center">Strength</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Batch No</th>
                                        <th class="text-center">Expiry Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('uploads/' . $p->image) }}" height="50" width="50"
                                                    alt=""></td>
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->company }}</td>
                                            <td>{{ $p->strength }}</td>
                                            <td>{{ $p->type }}</td>
                                            <td>{{ $p->price }}</td>
                                            <td>{{ $p->quantity }}</td>
                                            <td>{{ $p->batch_no }}</td>
                                            <td>{{ $p->expiry_date }}</td>
                                            <td>{{ $p->status }}</td>
                                            <td class="d-flex gap-1">
                                                <a href="{{ route('products.editproduct', $p->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $p->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $p->id }}"
                                                    action="{{ route('products.destroyproduct', $p->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ $errors->first() }}",
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let id = this.dataset.id;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });
    </script>
@endsection

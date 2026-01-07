@extends('app')
@section('page_title', 'categories')


@section('content')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between ">
                        <h5 class="font-weight-bolder mb-0 text-start">All Categories</h5>
                        <div class="ms-auto">
                            <a href="{{ route('categories.addcategory') }}" class="btn btn-primary btn-sm mb-0 btn  ms-auto ">
                                <i class="fa-solid fa-plus"></i> Add Category
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
                        <h6>Categories table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="height: 430px; overflow-y: auto;">
                        <div class="table-responsive p-0">
                            <table id="productTable" class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Serial</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Created At</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($product as $p)
                                        <tr>
                                            <td> {{ $loop->iteration }} </td>
                                            <td> <img src="{{ asset('uploads/' . $p->image) }}" height="50px"
                                                    width="50px" alt=""> </td>
                                            <td> {{ $p->name }} </td>
                                            <td> {{ $p->full_price }} </td>
                                            <td> {{ $p->original_price }} </td>
                                            <td> {{ $p->short_description }} </td>
                                            <td> {{ $p->sku }} </td>
                                            <td> {{ $p->brand }} </td>
                                            <td> {{ $p->weight }} </td>
                                            <td> {{ $p->dimension }} </td>
                                            <td>
                                                <a href="{{ route('products.editproduct',$p->id) }}" class="btn btn-sm btn-primary">
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
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4 text-center text-lg-start">
                        <div class="copyright text-sm text-muted">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Usman Qasim</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item"><a href="#" class="nav-link text-muted">Usman</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-muted">About Us</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-muted">Blog</a></li>
                            <li class="nav-item"><a href="#" class="nav-link pe-0 text-muted">License</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
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

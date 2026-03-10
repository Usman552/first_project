@extends('app')
@section('page_title', 'categories')


@section('content')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between ">
                        <h5 class="font-weight-bolder mb-0 text-start">All Users</h5>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="card p-0 rounded h-100" >
                    <div class="card-body px-0 pt-0 pb-2" style="height: 500px;>
                        <div class="table-responsive p-0 h-100">
                            <table id="usersTable" class="table mb-0 align-items-center">
                                <thead>
                                    <tr class="py-2">
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Serial</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Phone</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Address</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Created At</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Action</th>
                                    </tr>
                                </thead>
                                @foreach ($users as $user)
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->role }}</td>
                                            <td class="text-center">{{ $user->phone }}</td>
                                            <td class="text-center">{{ $user->address }}</td>
                                            <td class="text-center">{{ $user->created_at }}</td>
                                            <td class="text-center position-relative">
                                                <div class="dropdown">
                                                    <button class="btn btn-sm action-btn" data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-menu-end action-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-pencil-square me-2 text-primary"></i>
                                                                Edit
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-person-gear me-2 text-warning"></i>
                                                                Edit Role
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <button class="dropdown-item text-danger">
                                                                <i class="bi bi-trash me-2"></i>
                                                                Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach

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

@extends('dashboard.adminLayout.main')
@push('title')
    <title>users</title>
@endpush
@section('main-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users Trash</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="mb-2" style="text-align: end;">
                    <a href="{{ route('users.view') }}"><button class="btn btn-primary btn-sm">Users</button></a>
                </div>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->email_verified_at == null)
                                            <span class="badge bg-warning">Not Verified</span>
                                        @else
                                            <span class="badge bg-success">Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="restore/{{ $user->id }}"><button
                                                class="btn btn-primary btn-sm">Restore</button></a>
                                        <a href="/delete/{{ $user->id }}"><button
                                                onclick="return confirm('Are you sure you want to delete this user?')"
                                                class="btn btn-danger btn-sm">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $users->withQueryString()->links('pagination::bootstrap-5') }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

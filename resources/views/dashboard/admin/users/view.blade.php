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
                        <h1 class="m-0">User Details</h1>
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
                <div class="row">
                    <div class="col-9">
                        {{-- <form action="{{ route('users.view') }}" method="get">
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="search" name="search"
                                        value="{{ old($search) }}" autocomplete="off">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control mb-3 btn btn-primary" value="search">
                                </div>
                            </div>
                        </form> --}}
                        {{-- @if ($search)
                        <div class="col-md-5">
                            <a href="{{ route('users.view') }}">
                                <button class="btn btn-danger">Reset</button>
                            </a>
                        </div>
                        @endif --}}
                    </div>
                    {{-- <div class="col-3 mb-2" style="text-align: end;">
                        <a href="{{ route('trash.users') }}"><button class="btn btn-danger btn-sm">Trash</button></a>
                    </div> --}}
                </div>
                {{-- <div class="">
                    @if ($search)
                        <p>Search Results on <Strong>{{ $search }}</Strong> Keyword</p>
                    @endif
                </div> --}}
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                {{-- <th scope="col">Contact</th> --}}
                                <th scope="col">Registered Date</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">Channel</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="">
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($user->email_verified_at == null && $user->phone_verified_at == null)
                                            <span class="badge bg-danger">Not Verified</span>
                                        @elseif ($user->email_verified_at !== null && $user->phone_verified_at == null)
                                            <span class="badge bg-warning">Email Verified</span>
                                        @elseif($user->email_verified_at == null && $user->phone_verified_at !== null)
                                            <span class="badge bg-primary">Phone Verified</span>
                                        @else
                                            <span class="badge bg-success">Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="delete-user/{{ $user->id }}"><button
                                                onclick="return confirm('Are you sure yout want to move this user into trash?');"
                                                class="btn btn-danger btn-sm">Trash</button></a>
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
    <script>
        // let table = new DataTable('#myTable');
    </script>
@endsection

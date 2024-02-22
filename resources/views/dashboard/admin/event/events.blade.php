@extends('dashboard.adminLayout.main')
@push('title')
    <title>donerList</title>
@endpush
@section('main-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 fw-bold">Manage News</h1>
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
                <div class="d-flex justify-content-end m-2">
                    <a href="{{ route('event.create') }}"><button class="btn btn-primary">Add
                            News</button></a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary mb-2">
                                <h3 class="card-title">News</h3>
                            </div>
                            <!-- category display -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $item)
                                            <tr>
                                                <th>{{ $loop->index + 1 }}</th>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ Str::limit($item->description,50) }}</td>
                                                <td>
                                                    <img src="{{ asset('/events/' . $item->image) }}" width="40"
                                                        height="40" style="object-fit-cover;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('event.edit', $item->id) }}"><button
                                                            class="btn btn-primary btn-sm">Edit</button></a>
                                                    {{-- <a href="{{ route('event.view', $item->id) }}"><button
                                                            class="btn btn-info btn-sm">View</button></a> --}}
                                                    <a href="{{ route('event.delete', $item->id) }}"><button
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('are you sure want to delete this category?')">Delete</button></a>
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
    </div>
@endsection

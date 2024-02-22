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
                        {{-- <h1 class="m-0 fw-bold">Manage Events</h1> --}}
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <!-- Blog Post -->
                            <div class="blog-post">
                                <h2 class="mb-4">{{ $event->name }}</h2>
                                <p class="text-muted mb-4">{{ $event->description }}</p>
                                <p>{{ $event->datetime }}</p>
                                <img src="{{ asset('/events/' . $event->image) }}" alt="Blog Post Image"
                                    class="img-fluid mb-4">
                                {{-- <p></p> --}}
                            </div>
                            <!-- End Blog Post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <h1 class="m-0">Update News</h1>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">News Update</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="title" class="form-control" value="{{ $event->title }}"
                                        placeholder="Enter Event Name">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select form-control-border border-width-2" name="category">
                                        <option disabled>Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $event->category_id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="description">{{ $event->description }}</textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" id="content" placeholder="" rows="5"
                                        style="width: 100%; height: 50vh !important;">{{ $event->content }}</textarea>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="datetime">Date</label>
                                    <input type="datetime-local" class="form-control" name="published_date" value="{{$event->published_date}}"
                                        placeholder="">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="author">Author Name</label>
                                    <input type="text" name="author" class="form-control" value="{{$event->author}}"
                                        placeholder="Enter Author Name">
                                </div>
                                <div class="col-6 form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

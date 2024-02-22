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
                        <h3 class="card-title">News Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="name">News Title</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}"
                                        placeholder="Enter News Title">
                                        @if ($errors->has('title'))
                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                        @endif
                                </div>
                                <div class="col-6 form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select form-control-border border-width-2" name="category">
                                        <option selected disabled>Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                    <span class="text-danger">{{$errors->first('category')}}</span>
                                    @endif
                                </div>
                                <div class="col-12 form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="description">{{old('description')}}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                                <div class="col-12 form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" class="form-control" id="content" placeholder="" rows="5"
                                        style="width: 100%; height: 50vh !important;">{{old('content')}}</textarea>
                                        @if ($errors->has('content'))
                                        <span class="text-danger">{{$errors->first('content')}}</span>
                                        @endif
                                </div>
                                <div class="col-6 form-group">
                                    <label for="datetime">Date</label>
                                    <input type="datetime-local" class="form-control" name="published_date" value="{{old('published_date')}}"
                                        placeholder="">
                                        @if ($errors->has('published_date'))
                                        <span class="text-danger">{{$errors->first('published_date')}}</span>
                                        @endif
                                </div>
                                <div class="col-6 form-group">
                                    <label for="author">Author Name</label>
                                    <input type="text" name="author" class="form-control" value="{{old('author')}}"
                                        placeholder="Enter Author Name">
                                        @if ($errors->has('author'))
                                        <span class="text-danger">{{$errors->first('author')}}</span>
                                        @endif
                                </div>
                                <div class="col-12 form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" value="" placeholder="">
                                    @if ($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
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

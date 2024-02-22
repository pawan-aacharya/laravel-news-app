@extends('frontend.frontendLayout.mainLayout')
@push('title')
    <title>news category</title>
@endpush
@section('mainContent')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="block category-listing">
                        <h3 class="news-title"><span></span></h3>
                    </div>
                    <div class="row">
                        @foreach ($news as $singleNews)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="post-block-wrapper post-grid-view clearfix">
                                    <div class="post-thumbnail">
                                        <a href="single-post.html">
                                            <img class="img-fluid" src="{{ asset('/events/' . $singleNews->image) }}"
                                                alt="post-thumbnail" />
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-category"
                                            href="{{ route('frontend.single-post', $singleNews->id) }}">{{ $singleNews->category->name }}</a>
                                        <h2 class="post-title mt-3">
                                            <a href="{{ route('frontend.single-post', $singleNews->id) }}">{{ $singleNews->title }}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="posted-time">{{ calculateHours($singleNews->created_at) }}</span>
                                            <span class="post-author">by
                                                <a href="author.html">{{ $singleNews->author }}</a>
                                            </span>
                                        </div>
                                        <p>
                                            {{ $singleNews->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $news->links('pagination::bootstrap-5') }}
                    {{-- <nav aria-label="pagination-wrapper" class="pagination-wrapper">
                        <ul class="pagination justify-content-center">
                            <li class="page-item active">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left mr-2"></i></span>
                                    <span class="">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span class="">Next</span>
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right ml-2"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

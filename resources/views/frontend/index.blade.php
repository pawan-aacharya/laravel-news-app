@extends('frontend.frontendLayout.mainLayout')
@push('title')
    <title>index</title>
@endpush
@section('mainContent')
    <section class="featured-posts">
        <div class="container">
            <div class="row">
                @foreach ($news as $newsArticle)
                    <div class="col-md-12 col-xs-12 col-sm-6 col-lg-4">
                        <div class="post-featured-style"
                            style="background-image:url({{ asset('/events/' . $newsArticle->image) }})">
                            <div class="post-content">
                                <a href="{{ route('frontend.single-post', $newsArticle->id) }}"
                                    class="post-cat bg-success">{{ $newsArticle->category->name }}</a>
                                <h3 class="post-title">
                                    <a
                                        href="{{ route('frontend.single-post', $newsArticle->id) }}">{{ $newsArticle->title }}</a>
                                </h3>
                                <div class="post-meta mt-2">
                                    <p class="text-white">{{ Str::limit($newsArticle->description, 20) }}</p>
                                    <span class="posted-time"><i
                                            class="fa fa-clock-o mr-2 text-danger"></i>{{ calculateHours($newsArticle->created_at) }}</span>
                                    <span class="post-author">
                                        <span> by </span>
                                        <a href="author.html">{{ $newsArticle->author }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $news->links('pagination::bootstrap-5') }}
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="all-news-block">
                        <h3 class="news-title">
                            <span>Popular Articles</span>
                        </h3>
                        <div class="all-news">
                            <div class="row">
                                @foreach ($news1 as $latestNews)
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="post-block-wrapper post-float-half clearfix">
                                            <div class="post-thumbnail">
                                                <a href="single-post.html">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/events/' . $latestNews->image) }}"
                                                        alt="post-thumbnail" />
                                                </a>
                                            </div>
                                            <div class="post-content ms-2">
                                                <a class="post-category"
                                                    href="{{ route('frontend.single-post', $latestNews->id) }}">{{ $latestNews->category->name }}</a>
                                                <h2 class="post-title mt-3">
                                                    <a
                                                        href="{{ route('frontend.single-post', $latestNews->id) }}">{{ $latestNews->title }}</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <span
                                                        class="posted-time">{{ calculateHours($latestNews->created_at) }}</span>
                                                    <span class="post-author">by
                                                        <a href="#">{{ $latestNews->author }}</a>
                                                    </span>
                                                </div>
                                                <p>
                                                    {{$latestNews->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
                {{-- <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget">
                            <h3 class="news-title">
                                <span>Top Authors</span>
                            </h3>
                            <div class="post-list-block">
                                <div class=" review-post-list">
                                    <div class="top-author">
                                        <img src="images/news/author-01.jpg" alt="author-thumb">
                                        <div class="info">
                                            <h4 class="name"><a href="author.html">Jack Rockshow</a></h4>
                                            <ul class="list-unstyled">
                                                <li>37 Posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="top-author">
                                        <img src="images/news/author-02.jpg" alt="author-thumb">
                                        <div class="info">
                                            <h4 class="name"><a href="author.html">Lint Handson</a></h4>
                                            <ul class="list-unstyled">
                                                <li>28 Posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="top-author">
                                        <img src="images/news/author-03.jpg" alt="author-thumb">
                                        <div class="info">
                                            <h4 class="name"><a href="author.html">Ronny Robeen</a></h4>
                                            <ul class="list-unstyled">
                                                <li>19 Posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="top-author">
                                        <img src="images/news/author-02.jpg" alt="author-thumb">
                                        <div class="info">
                                            <h4 class="name"><a href="author.html">Handson</a></h4>
                                            <ul class="list-unstyled">
                                                <li>18 Posts</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <div class="py-40"></div>
@endsection

@include('frontend.frontendLayout.head')
@push('title')
    <title>single-post</title>
@endpush
@include('frontend.frontendLayout.navbar')
<section class="single-block-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="single-post">
                    <div class="post-header mb-5">
                        <a class="post-category" href="#">{{ $news->category->name }}</a>
                        <h2 class="post-title">
                            {{ $news->title }}
                        </h2>

                        <p>{{ $news->description }}</p>
                    </div>
                    <div class="post-body">
                        <div class="post-featured-image">
                            <img src="{{ asset('/events/' . $news->image) }}" class="img-fluid" alt="featured-image"
                                style="width: 100%;">
                            <div class="d-flex justify-content-end mt-1">
                                <p>Published Date: {{ $news->published_date }}</p>
                            </div>
                        </div>
                        <div class="entry-content">
                            <p>
                                {{ str_replace('&nbsp;', '', strip_tags($news->content)) }}
                            </p>
                            <div class="d-flex justify-content-end">
                                <p><strong>Author: </strong>{{ $news->author }}</p>
                            </div>
                            <div class="views">
                                @if (!empty($news->count))
                                    <span class=""><i class="fa fa-eye"> Views:</i> {{ $news->count }}</span>
                                @endif
                            </div>
                        </div>

                        <div
                            class="share-block  d-flex justify-content-between align-items-center border-top border-bottom mt-5">
                            <div class="post-tags">
                                <span>Categories</span>
                                @foreach ($categories as $category)
                                    <a href="{{ route('frontend.category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>

                            <ul class="share-icons list-unstyled ">
                                <li class="facebook">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="gplus">
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="pinterest">
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="reddit">
                                    <a href="#">
                                        <i class="fa fa-reddit-alien"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <nav class="post-navigation clearfix">
                    <div class="previous-post">
                        <a href="single-post.html">
                            <h6 class="text-uppercase">Next</h6>
                            <h3>
                                Intel’s new smart glasses actually look good
                            </h3>
                        </a>
                    </div>
                    <div class="next-post">
                        <a href="single-post.html">
                            <h6 class="text-uppercase">Previous</h6>

                            <h3>
                                Free Two-Hour Delivery From Whole Foods
                            </h3>
                        </a>
                    </div>
                </nav>
                {{-- <div class="related-posts-block">
                    <h3 class="news-title">
                        <span>Related Posts</span>
                    </h3>
                    <div class="news-style-two-slide">
                        <!-- Related posts content here -->
                    </div>
                </div> --}}
                <hr>



                <div class="comment-form ">
                    <h3 class="title-normal">Leave a Comment </h3>
                    <p class="mb-4">Your email address will not be published. Required fields are marked *</p>
                    <form action="{{ route('comment.store') }}" method="POST" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control required-field" name="message" id="message" placeholder="Messege" rows="8"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" placeholder="Name"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" placeholder="Email"
                                        type="email" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" name="website" type="text" placeholder="Website"
                                        required>
                                </div>
                            </div>
                            <input type="hidden" name="news_id" value="{{ $news->id }}">

                            <div class="col-md-12">
                                <button class="comments-btn btn btn-primary " type="submit">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="comments" class="comments-block block">
                    <h3 class="news-title">
                        <span>{{ $totalCommentsCount }} Comments</span>
                    </h3>
                    <ul class="all-comments">
                        @foreach ($comments as $comment)
                            <li>
                                <div class="comment">
                                    <img class="commented-person" alt=""
                                        src="{{ asset('frontend/theme/images/profile.png') }}">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="commented-person-name">{{ $comment->name }}</span>
                                            <span class="comment-hour d-block"><i
                                                    class="fa fa-clock-o mr-2"></i>{{ $comment->created_at->format('F j, Y, g:i a') }}</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>
                                                {{ $comment->message }}
                                            </p>
                                        </div>
                                        {{-- <div class="text-left">
                                            <a class="comment-reply" href="#"><i class="fa fa-reply"></i> Reply</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

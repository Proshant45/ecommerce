<x-frontend.layout>


    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details-wrap">
                        <img src="/storage/{{$blog->image}}" alt="">
                        <h3>{{$blog->title}}</h3>
                        <ul class="meta">
                            <li>{{$blog->created_at}}</li>
                            <li>{{$blog->user->name}}</li>
                        </ul>
                        <p>{{$blog->body}}</p>
                        <div class="share-wrap">
                            <div class="row">
                                <div class="col-sm-7 ">
                                    <ul class="socil-icon d-flex">
                                        <li>share it on :</li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-5 text-right">
                                    <a href="javascript:void(0);">Next Post <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form-area">
                        <div class="comment-main">
                            <h3 class="blog-title">Comments:</h3>
                            <ol class="comments">
                                <li class="comment even thread-even depth-1">
                                    @if($blog->comments)
                                        @foreach($blog->comments as $comment)
                                            <div class="comment-wrap">
                                                <div class="comment-theme">
                                                    <div class="comment-image">
                                                        <img src="assets/images/comment/1.png" alt="Jhon">
                                                    </div>
                                                </div>
                                                <div class="comment-main-area">
                                                    <div class="comment-wrapper">
                                                        <div class="sewl-comments-meta">
                                                            <h4>{{$comment->user->name}} </h4>
                                                            <span>{{$comment->created_at}}</span>
                                                        </div>
                                                        <div class="comment-area">
                                                            <p>{{$comment->body}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(count($blog->comments)<1)
                                        <div class="comment-wrap">
                                            <div class="comment-main-area">
                                                <div class="comment-wrapper">
                                                    <div class="comment-area">
                                                        <p>Be the first one to comment!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </li>
                            </ol>
                        </div>
                        <div id="respond" class="sewl-comment-form comment-respond form-style">
                            @if(!auth()->user())
                                <h3 id="reply-title" class="blog-title">Please login to <span>comment</span></h3>
                            @else
                                <h3 id="reply-title" class="blog-title">Leave a <span>comment</span></h3>
                                <form novalidate="" method="post" id="commentform" class="comment-form"
                                      action="/comment/{{$blog->id}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="sewl-form-textarea no-padding-right">
                                            <textarea id="comment" name="comment" tabindex="4" rows="3" cols="30"
                                                      placeholder="Write Your Comments..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-submit">
                                                <input name="submit" id="submit" value="Send" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">Categories</h4>
                            <ul>
                                <li><a href="#">Coconut Oil</a></li>
                                <li><a href="#">Honey</a></li>
                                <li><a href="#">Olive Oil</a></li>
                                <li><a href="#">Nut Oil</a></li>
                                <li><a href="#">Mustard Oil</a></li>
                                <li><a href="#">Sunrise Oil</a></li>
                            </ul>
                        </div>
                        <div class="widget widget_recent_entries recent_post">
                            <h4 class="widget-title">Recent Post</h4>
                            <ul>
                                <li>
                                    <div class="post-img">
                                        <img src="assets/images/post/1.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="blog-details.html">Lorem Ipsum is simply dummy text of the </a>
                                        <p>19 JAN 2019</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-img">
                                        <img src="assets/images/post/2.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="blog-details.html">Lorem Ipsum is simply dummy text of the </a>
                                        <p>19 JAN 2019</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-img">
                                        <img src="assets/images/post/3.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="blog-details.html">Lorem Ipsum is simply dummy text of the </a>
                                        <p>19 JAN 2019</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-img">
                                        <img src="assets/images/post/4.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="blog-details.html">Lorem Ipsum is simply dummy text of the </a>
                                        <p>19 JAN 2019</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <x-frontend.news-letter/>
</x-frontend.layout>

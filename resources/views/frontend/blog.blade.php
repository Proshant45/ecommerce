<x-frontend.layout>
    <div class="blog-area">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Latest News</h2>
                    <img src="{{asset('assets')}}/images/section-title.png" alt="">
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="blog-wrap">
                            <div class="blog-image">
                                <img src="storage/{{$blog->image}}" alt="">
                                <ul>
                                    <li>{{ $blog->created_at->format('Y')}}</li>
                                    <li>{{ $blog->created_at->format('m')}}</li>
                                </ul>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                                        <li class="pull-right"><a href="#"><i class="fa fa-clock-o"></i>
                                                {{ $blog->created_at->format('d/m/Y')}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></h3>
                                <p>{{ \Illuminate\Support\Str::limit($blog->body, 250) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- blog-area end -->
    <!-- start social-newsletter-section -->
    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe Newsletter</h3>
                        <div class="newsletter-form">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
</x-frontend.layout>
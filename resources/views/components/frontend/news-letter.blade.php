<section class="social-newsletter-section" id="newslatter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter text-center">
                    <h3>Subscribe Newsletter</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="newsletter-form">

                        <form action="/news_letter#newslatter" method="post">
                            @csrf
                            <input name="email" type="email" class="form-control"
                                   placeholder="Enter Your Email Address...">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>

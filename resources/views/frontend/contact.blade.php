<x-frontend.layout>


    <!-- header-area end -->
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><span>Contact</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- contact-area start -->
    <div class="google-map py-md-5 mx-5 ">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671"
                    allowfullscreen></iframe>
        </div>
    </div>
    <div class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form form-style">
                        <div class="cf-msg"></div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="/contact" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label>Name</label>
                                    <input type="text" placeholder="Name" id="fname" name="name"
                                           value=" {{old('name')}}">
                                </div>
                                <div class="col-12  col-sm-6">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" id="email" name="email"
                                           value=" {{old('email')}}">
                                </div>
                                <div class="col-12">
                                    <label>Subject</label>
                                    <input type="text" placeholder="Subject" id="subject" name="subject"
                                           value=" {{old('subject')}}">
                                </div>
                                <div class="col-12">
                                    <label>Message</label>
                                    <textarea class="contact-textarea" placeholder="message" id="msg"
                                              name="message"></textarea>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <button type="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-wrap">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i> Address:
                                <p>1234, Contrary to popular Sed ut perspiciatis unde 1234</p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> Email address:
                                <p>
                                    <span>info@yoursite.com </span>
                                    <span>info@yoursite.com </span>
                                </p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> phone number:
                                <p>
                                    <span>+0123456789</span>
                                    <span>+1234567890</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area end -->
    <!-- start social-newsletter-section -->
    <x-frontend.news-letter/>

</x-frontend.layout>

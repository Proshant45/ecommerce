<?php

    namespace App\Http\Controllers;

    use App\Models\Blog;
    use App\Models\NewsLater;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class HomeController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $latest_products = Product::orderBy('created_at', 'desc')->take(16)->get();
            return view('frontend.index', ['latest_products' => $latest_products]);
        }

        public function about()
        {
            return view('frontend.about');
        }

        public function contact()
        {
            return view('frontend.contact');
        }

        /**
         * Show the form for creating a new resource.
         */
        public function blog()
        {
            $blogs = Blog::with('user')->get();
            return view('frontend.blog', ['blogs' => $blogs]);
        }

        public function store(Request $request)
        {
            $attributes = $request->validate([
                'email' => 'required|email',
            ]);

            NewsLater::firstOrCreate(
                $attributes
            );

            return back()->with('success', 'Thank You!');

        }


    }

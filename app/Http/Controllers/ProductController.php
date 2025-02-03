<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $categories = Category::latest()->get()->take(5);
            $products = Product::paginate(20);
            return view('frontend.shop', ['products' => $products, 'categories' => $categories]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {

        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required',
            ]);
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }

    }

<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class SearchController extends Controller
    {
        public function __invoke()
        {
            $products = Product::where('name', 'like', '%'.request('q').'%')
                ->orWhere('description', 'like', '%'.request('q').'%')
                ->get()->take(10);

            return view('frontend.search', ['products' => $products]);
        }
    }

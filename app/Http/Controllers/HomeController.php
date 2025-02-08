<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $latest_products = Product::orderBy('created_at', 'desc')->take(16)->get();
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
        return view('frontend.blog');
    }



}

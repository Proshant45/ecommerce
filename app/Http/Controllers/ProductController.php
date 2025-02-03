<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Image as ImageModel;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Intervention\Image\Image;

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

        public function show(string $slug)
        {
            $product = Product::find($slug);

            return view('frontend.single-product', ['product' => $product]);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {

            $attributes = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category' => 'required',
                'images' => 'required',
            ]);
            $attributes['category_id'] = $attributes['category'];
            $attributes['slug'] = Str::slug($attributes['name']);

            $images = $request->file('images');
            $product = Product::create($attributes);

            foreach ($images as $image) {
                $img = Image::make($image)->encode('jpg');
                $filename = uniqid('product_').'.jpg';
                Storage::disk('public')->put('uploads/'.$filename, $img);
                $imageData = new ImageModel();
                $imageData->path = 'uploads/'.$filename; // This is the path you can store
                $imageData->product_id = $product->id;
                $imageData->name = $filename;
                $imageData->save();

            }

            return redirect()->back()->with('success', 'Product created successfully');
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $categories = Category::all();

            return view('backend.product.create', ['categories' => $categories]);

        }

        /**
         * Display the specified resource.
         */

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

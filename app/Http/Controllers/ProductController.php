<?php


    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Image as ImageModel;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Intervention\Image\Drivers\Gd\Driver;
    use Intervention\Image\ImageManager;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $categories = Category::latest()->get()->take(5);
            $products = Product::latest()->paginate(10);

            return view('frontend.shop', ['products' => $products, 'categories' => $categories]);
        }

        public function show(string $slug)
        {
            $product = Product::where('slug', $slug)->first();

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
                'category_id' => 'required',
                'images' => 'required',
            ]);

            $attributes['slug'] = Str::slug($attributes['name'], '-');

            $images = $request->file('images');
            $featured_image = $request->file('featured_image');
            $category = Category::find($attributes['category_id']);
            $product = Product::create([
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'price' => $attributes['price'],
                'slug' => $attributes['slug'],
            ]);
            $product->category($category->id);

            // Incomplete - Add the featured image to the product
            $manager = new ImageManager(new Driver);
            foreach ($images as $image) {
                $img = $manager->read($image->getRealPath());
                $img->toWebp();
                $filename = uniqid('product_').'.webp';
                Storage::disk('public')->put('uploads/'.$filename, $img->encode());

                $imageData = new ImageModel;
                $imageData->path = 'uploads/'.$filename;
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

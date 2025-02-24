<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use Illuminate\Http\Request;

    class CategoryController extends Controller
    {


        public function show(string $slug)
        {
            $category = Category::where('slug', $slug)->first();
            $products = $category->products()->paginate(12);

            return view('frontend.category', ['products' => $products, 'category' => $category]);
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

<?php

    namespace App\Http\Controllers;

    use App\Models\Blog;
    use Illuminate\Http\Request;

    class BlogController extends Controller
    {


        public function storeComment(Request $request, $id)
        {
            $attribute = $request->validate([
                'comment' => 'required'
            ]);
            $blog = Blog::where('id', $id)->first();


            $blog->comments()->create(
                [
                    'blog_id' => $id,
                    'user_id' => auth()->user()->id,
                    'body' => $attribute['comment'],
                ]
            );

            return redirect()->back();

        }

        /**
         * Display the specified resource.
         */
        public function show($slug)
        {
            $blog = Blog::where('slug', $slug)->first();

            return view('frontend.blog-details', ['blog' => $blog]);
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Blog $blog)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Blog $blog)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Blog $blog)
        {
            //
        }
    }

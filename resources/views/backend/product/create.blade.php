<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<div class="container ">
    <div class="flex justify-center">
        <h1 class="text-2xl">Upload Product</h1>
        <form action="/admin/product_upload" enctype="multipart/form-data" class="mx-auto py-4 flex flex-col"
              method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach

                </select>
            </div>
            <div class="featured">
                <label>Select Featured Image :</label>
                <input type="file" name="featured_image">
            </div>
            <label>Select Images:</label>
            <input type="file" name="images[]" multiple>

            <button type="submit">Upload Product</button>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
        </form>
    </div>

</div>
</body>
</html>
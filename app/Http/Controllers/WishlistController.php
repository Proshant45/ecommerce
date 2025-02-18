<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use App\Models\Wishlist;
    use App\Models\WishListItem;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class WishlistController extends Controller
    {
        public function wishlist()
        {
            $wishlist = Wishlist::firstOrCreate([
                'user_id' => Auth::id(),
            ]);
            $wishlist_items = $wishlist->items;

            return view('frontend.wishlist', ['wishlist_items' => $wishlist_items]);
        }

        public function addToWislist($id)
        {
            $product = Product::findOrFail($id);

            $wishlist = Wishlist::firstOrCreate([
                'user_id' => auth()->user()->id,
            ]);

            $wishlistitem = $wishlist->items()->where('product_id', $id)->first();

            if ($wishlistitem) {
                return redirect()->back()->with('error', 'Product already in wishlist');
            }
            $wishlistitem = new WishListItem([
                'product_id' => $id,
            ]);
            $wishlist->items()->save($wishlistitem);

            return redirect()->back()->with('success', 'Product added to cart');
        }

        public function removeFromwishlist($id)
        {
            WishListItem::where('id', $id)->delete();

            return redirect()->back()->with('success', 'Product removed from Wishlish');
        }
    }

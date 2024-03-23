<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;
use Cart;
use Auth;

class WishlistComponent extends Component
{
    //Removed for Wishlist Product Method
    public function removeFromWishlist($product_id) {
        if(Auth::check()) {
            foreach(Cart::instance('wishlist')->content() as $wishlist_item) {
                if($wishlist_item->id == $product_id) {
                    Cart::instance('wishlist')->remove($wishlist_item->rowId);
                    $this->emitTo('front-end.wishlist-count-component','refreshComponent');
                    toastr()->success('Item is removed for wishlist!');
                    return;
                }
            }
        }
        else {
            toastr()->error('Please first login in your account, then item removed for wishlist!');
        }
    }
    //move product from wishlist item to cart item method
    public function moveProductFromWishlistToCart($rowId) {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Models\Product');
        $this->emitTo('front-end.wishlist-count-component','refreshComponent');
        $this->emitTo('front-end.cart-count-component','refreshComponent');
        toastr()->success('Move to cart successfully!');
    }
    //render method
    public function render()
    {
        //view wishlist component
        return view('livewire.front-end.wishlist-component')->layout('layouts.master');
    }
}

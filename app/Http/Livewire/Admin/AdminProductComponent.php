<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //product search variable
    public $searchTerm;
    //product inactive method
    public function inactiveProduct($id) {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        toastr()->success('Product has been inactivated!');
    }
    //product active method
    public function activeProduct($id) {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        toastr()->success('Product has been activated!');
    }
    //product delete method
    public function deleteProduct($id) {
        $product = Product::find($id);
        //product image check
        if($product->image) {
            unlink('assets/images/products'. '/' .$product->image);
        }
        //product gallery check
        if($product->images) {
            $images = explode(",", $product->images);
            foreach($images as $image) {
                unlink('assets/images/products'. '/' .$image);
            }
        }
        $product->delete();
        toastr()->success('Product has been deleted successfully!');
    }
    //render method
    public function render()
    {
        //search variable
        $search = '%' .$this->searchTerm .'%';
        //product search like name, purchase price, regular price, discounted price and status
        $products = Product::where('name','LIKE',$search)
                            ->orWhere('purchase_price','LIKE',$search)
                            ->orWhere('regular_price','LIKE',$search)
                            ->orWhere('discounted_price','LIKE',$search)
                            ->orWhere('status','LIKE',$search)
                            ->orderBy('id','DESC')->paginate(10);
        //view of product component
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.master');
    }
}

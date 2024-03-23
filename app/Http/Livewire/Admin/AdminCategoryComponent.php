<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    //category inactive method
    public function inactiveCategory($id) {
        $category = Category::find($id);
        $category->active_status = 0;
        $category->save();

        toastr()->success('Category has been inactivated!');
    }
    //category active method
    public function activeCategory($id) {
        $category = Category::find($id);
        $category->active_status = 1;
        $category->save();

        toastr()->success('Category has been activated!');
    }
    //category delete method
    public function deleteCategory($id) {
        //single category fetch
        $category = Category::find($id);
        //category related all products fetch
        $categoryProducts = Product::where('category_id', $category->id)->get();
        //category icon check to category delete
        if($category->icon) {
            unlink('assets/images/category'. '/' .$category->icon);
        }
        $category->delete();
        //category products delete
        foreach($categoryProducts as $categoryProduct) {
            //category products image check and delete
            if($categoryProduct->image) {
                unlink('assets/images/products'. '/' .$categoryProduct->image);
            }
            //category products images check and delete
            if($categoryProduct->images) {
                $images = explode(",", $categoryProduct->images);
                foreach($images as $image) {
                    unlink('assets/images/products'. '/' .$image);
                }
            }
            $categoryProduct->delete();
        }

        toastr()->success('Category and category products has been deleted!');
    }
    //sub category delete method
    public function deleteSubCategory($id) {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        toastr()->success('Sub Category has been deleted!');
    }
    //child category delete method
    public function deleteChildCategory($id) {
        $childCategory = ChildCategory::find($id);
        $childCategory->delete();

        toastr()->success('Child Category has been deleted!');
    }
    //laravel pagination use
    use WithPagination;
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::orderBy('id','DESC')->paginate(5);
        //view of category, sub category and child category component
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.master');
    }
}

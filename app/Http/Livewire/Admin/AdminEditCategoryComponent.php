<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminEditCategoryComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //category, sub category and child category update form all variables
    public $category_slug;
    public $category_id;
    public $dcategory_id;
    public $name;
    public $slug;
    public $icon;
    public $newicon;
    public $subcategory_id;
    public $dsubcategory_id;
    public $subcategory_slug;
    public $childCategory_id;
    public $dchildcategory_id;
    public $childCategory_slug;
    //mount function of category id, subcategory id and child category id to retrive category, sub category and child category data with database
    public function mount($category_slug, $subcategory_slug=null, $childCategory_slug=null) {
        //check to retrive child category data
        if($this->childCategory_slug) {
            $this->childCategory_slug = $childCategory_slug;
            $childCategory = ChildCategory::where('slug', $childCategory_slug)->first();
            $this->dchildcategory_id = $childCategory->id;
            $this->name = $childCategory->name;
            $this->slug = $childCategory->slug;
            $this->category_id = $childCategory->category_id;
            $this->subcategory_id = $childCategory->subcategory_id;
        }
        //check to retrive sub category data
        else if($this->subcategory_slug) {
            $this->subcategory_slug = $subcategory_slug;
            $subcategory = Subcategory::where('slug', $subcategory_slug)->first();
            $this->dsubcategory_id = $subcategory->id;
            $this->name = $subcategory->name;
            $this->slug = $subcategory->slug;
            $this->category_id = $subcategory->category_id;
        }
        //check to retrive child category data
        else {
            $this->category_slug = $category_slug;
            $category = Category::where('slug', $category_slug)->first();
            $this->dcategory_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->icon = $category->icon;
        }
    }
    //generate slug to category, sub category and child category name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //select category change category related sub category
    public function changeSubCategory() {
        $this->subcategory_id = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'name'=>'required|min:3|max:255',
            'slug'=>'required'
        ]);

        if($this->newicon) {
            $this->validateOnly($fields, [
                'newicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //category, sub category and child category update method
    public function updateCategory() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required'
        ]);

        if($this->newicon) {
            $this->validate([
                'newicon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //category select and sub category null to sub category data update with database
        if($this->category_id && $this->subcategory_id == null) {
            $subCategory = Subcategory::find($this->dsubcategory_id);
            $subCategory->name = $this->name;
            $subCategory->slug = $this->slug;
            $subCategory->category_id = $this->category_id;
            $subCategory->save();
            toastr()->success('Sub Category has been updated!');
        }
        //category select and sub category select to child category data update with database
        if($this->category_id && $this->subcategory_id) {
            $childCategory = ChildCategory::find($this->dchildcategory_id);
            $childCategory->name = $this->name;
            $childCategory->slug = $this->slug;
            $childCategory->category_id = $this->category_id;
            $childCategory->subcategory_id = $this->subcategory_id;
            $childCategory->save();
            toastr()->success('Child Category has been updated!');
        }
        //category null and sub category null to category data update with database
        if($this->category_id == null) {
            $category = Category::find($this->dcategory_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            //category icon check
            if($this->newicon) {
                if($category->icon) {
                    unlink('assets/images/category'. '/' .$category->icon);
                }
                $iconName = Carbon::now()->timestamp. '.' .$this->newicon->extension();
                Image::make($this->newicon)->resize(120, 120)->save('assets/images/category/'.$iconName);
                $category->icon = $iconName;
            }
            $category->save();
            toastr()->success('Category has been updated!');
        }
    }
    //render method
    public function render()
    {
        //all active categories fetch
        $categories = Category::where('active_status', 1)->get();
        //category related all sub categories fetch
        $subCategories = Subcategory::where('category_id',$this->category_id)->get();
        //view of edit category component
        return view('livewire.admin.admin-edit-category-component',['categories'=>$categories,'subCategories'=>$subCategories])->layout('layouts.master');
    }
}

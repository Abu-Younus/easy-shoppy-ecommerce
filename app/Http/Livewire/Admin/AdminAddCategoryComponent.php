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

class AdminAddCategoryComponent extends Component
{
    //laravel fileuploads use
    use WithFileUploads;
    //category, subcategory and childcategory store form all variables
    public $name;
    public $slug;
    public $icon;
    public $category_id;
    public $subcategory_id;
    //generate slug to category, subcategory and childcategory name
    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }
    //category select for change category related subcategory
    public function changeSubCategory() {
        $this->subcategory_id = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields, [
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:categories'
        ]);

        if($this->icon) {
            $this->validateOnly($fields,[
                'icon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->name = '';
        $this->slug = '';
        $this->icon = null;
        $this->category_id = null;
        $this->subcategory_id = null;
    }
    //category, subcategory and childcategory store method
    public function storeCategory() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:255',
            'slug'=>'required|unique:categories'
        ]);

        if($this->icon) {
            $this->validate([
                'icon'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //category select and subcategory empty check for subcategory store database
        if($this->category_id && $this->subcategory_id == null) {
            $subCategory = new Subcategory();
            $subCategory->name = $this->name;
            $subCategory->slug = $this->slug;
            $subCategory->category_id = $this->category_id;
            $subCategory->save();
            toastr()->success('Sub Category has been Created!');
        }
        //category select and subcategory select check for childcategory store database
        if($this->category_id && $this->subcategory_id) {
            $childCategory = new ChildCategory();
            $childCategory->name = $this->name;
            $childCategory->slug = $this->slug;
            $childCategory->category_id = $this->category_id;
            $childCategory->subcategory_id = $this->subcategory_id;
            $childCategory->save();
            toastr()->success('Child Category has been Created!');
        }
        //category empty and subcategory empty check for main category store database
        if($this->category_id == null) {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            //main category icon check
            if($this->icon) {
                $iconName = Carbon::now()->timestamp. '.' .$this->icon->extension();
                Image::make($this->icon)->resize(120, 120)->save('assets/images/category/'.$iconName);
                $category->icon = $iconName;
            }
            $category->save();
            toastr()->success('Category has been Created!');
        }
        $this->resetForm();
    }
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::where('active_status', 1)->get();
        //category related all subcategories fetch
        $subCategories = Subcategory::where('category_id',$this->category_id)->get();
        //view of add category, subcategory and childcategory component
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories,'subCategories'=>$subCategories])->layout('layouts.master');
    }
}

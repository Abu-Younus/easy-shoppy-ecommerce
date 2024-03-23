<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use App\Models\Product;
use App\Models\CampaignProduct;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCampaignProductComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //campaign slug variable to campaign data fetch
    public $campaign_slug;
    //mount function to campaign data retrive with database
    public function mount($campaign_slug) {
        $this->campaign_slug = $campaign_slug;
    }
    //campaign product add method
    public function campaignProductAdd($id) {
        //campaign data fetch
        $campaign = Campaign::where('slug',$this->campaign_slug)->first();
        //product data fetch
        $product = Product::find($id);
        //campaign product discount amount count
        $discountAmount = ($product->regular_price*$campaign->discount)/100;
        $afterDiscountPrice = $product->regular_price - $discountAmount;
        //product already add to campaign check
        $existCampaignProduct = CampaignProduct::where('campaign_id',$campaign->id)->where('product_id',$product->id)->first();
        if(!$existCampaignProduct) {
            //campaign product store with database
            $campaignProduct = new CampaignProduct();
            $campaignProduct->campaign_id = $campaign->id;
            $campaignProduct->product_id = $product->id;
            $campaignProduct->price = $afterDiscountPrice;
            $campaignProduct->save();

            toastr()->success('Added Successfully!');
        }
        else {
            toastr()->error('Already added this product!');
        }

    }
    //render method
    public function render()
    {
        //all products fetch
        $products = Product::where('status',1)->orderBy('id','DESC')->paginate(16);
        //view of campaign product component
        return view('livewire.admin.admin-campaign-product-component',['products'=>$products])->layout('layouts.master');
    }
}

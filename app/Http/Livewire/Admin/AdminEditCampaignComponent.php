<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminEditCampaignComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //campaign update form all variables
    public $campaign_id;
    public $title;
    public $slug;
    public $subtitle;
    public $start_date;
    public $end_date;
    public $image;
    public $newimage;
    public $discount;
    public $status;
    public $month;
    public $year;
    //mount function of campaign slug to retrive campaign data with database
    public function mount($slug) {
        $slug = $this->slug;
        $campaign = Campaign::where('slug',$slug)->first();
        $this->title = $campaign->title;
        if($campaign->subtitle) {
            $this->subtitle = $campaign->subtitle;
        }
        $this->slug = $campaign->slug;
        $this->start_date = $campaign->start_date;
        $this->end_date = $campaign->end_date;
        $this->image = $campaign->image;
        $this->discount = $campaign->discount;
        $this->status= $campaign->status;
        $this->campaign_id = $campaign->id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'title'=>'required|min:5|max:255',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount'=>'required',
        ]);
        if($this->subtitle) {
            $this->validateOnly($fields,[
                'subtitle'=>'required|min:5|max:255',
            ]);
        }
        if($this->newimage) {
            $this->validateOnly($fields,[
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //campaign update method
    public function updateCampaign() {
        //form validation
        $this->validate([
            'title'=>'required|min:5|max:255',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount'=>'required',
        ]);

        if($this->subtitle) {
            $this->validate([
                'subtitle'=>'required|min:5|max:255',
            ]);
        }

        if($this->newimage) {
            $this->validate([
                'newimage'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //campaign update data store database
        $campaign = Campaign::find($this->campaign_id);
        $campaign->title = $this->title;
        $campaign->slug = Str::slug($this->title);
        if($this->subtitle) {
            $campaign->subtitle = $this->subtitle;
        }
        $campaign->start_date = $this->start_date;
        $campaign->end_date = $this->end_date;
        //campaign image check
        if($this->newimage) {
            if($campaign->image) {
                unlink('assets/images/campaigns'. '/' .$campaign->image);
            }
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            Image::make($this->newimage)->resize(728,90)->save('assets/images/campaigns/'.$imageName);
            $campaign->image = $imageName;
        }
        $campaign->discount = $this->discount;
        $campaign->status = $this->status;
        $campaign->month = date('F');
        $campaign->year = date('Y');

        $campaign->save();

        toastr()->success('Campaigns has been updated!');
    }
    //render method
    public function render()
    {
        //view of edit campaign component
        return view('livewire.admin.admin-edit-campaign-component')->layout('layouts.master');
    }
}

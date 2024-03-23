<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Image;

class AdminAddCampaignComponent extends Component
{
    //laravel fileuploads use
    use WithFileUploads;
    //campaign store form all variables
    public $title;
    public $subtitle;
    public $start_date;
    public $end_date;
    public $image;
    public $discount;
    public $status;
    public $month;
    public $year;
    //status initialize to mount function
    public function mount() {
        $this->status = 1;
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
        if($this->image) {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->title = '';
        $this->subtitle = '';
        $this->image = null;
        $this->start_date = '';
        $this->end_date = '';
        $this->discount = '';
        $this->status = 1;
    }
    //campaign store method
    public function storeCampaign() {
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

        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //campaign store database
        $campaign = new Campaign();
        $campaign->title = $this->title;
        $campaign->slug = Str::slug($this->title);
        if($this->subtitle) {
            $campaign->subtitle = $this->subtitle;
        }
        $campaign->start_date = $this->start_date;
        $campaign->end_date = $this->end_date;
        //campaign image check
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(728,90)->save('assets/images/campaigns/'.$imageName);
            $campaign->image = $imageName;
        }
        $campaign->discount = $this->discount;
        $campaign->status = $this->status;
        $campaign->month = date('F');
        $campaign->year = date('Y');

        $campaign->save();
        $this->resetForm();
        toastr()->success('Campaigns has been saved!');

    }
    //rander method
    public function render()
    {
        //view of add campaign component
        return view('livewire.admin.admin-add-campaign-component')->layout('layouts.master');
    }
}

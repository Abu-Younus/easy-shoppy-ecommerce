<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCampaignsComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //campaign delete method
    public function deleteCampaign($id) {
        $campaign = Campaign::find($id);
        //image check to campaing delete
        if($campaign->image) {
            unlink('assets/images/campaigns'. '/' .$campaign->image);
        }
        $campaign->delete();

        toastr()->success('Campaign has been deleted!');
    }
    //render method
    public function render()
    {
        //all campaigns fetch
        $campaigns = Campaign::orderBy('id','DESC')->paginate(5);
        //view of campaigns component
        return view('livewire.admin.admin-campaigns-component',['campaigns'=>$campaigns])->layout('layouts.master');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\OpenTicket;
use App\Models\TicketReply;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use Image;

class AdminOpenTicketDetailsComponent extends Component
{
    //laravel file uploads use
    use WithFileUploads;
    //ticket details variables
    public $ticket_id;
    public $message;
    public $image;
    //mount function to ticket id fetch
    public function mount($ticket_id) {
        $this->ticket_id = $ticket_id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'message'=>'required|min:5|max:500',
        ]);

        if($this->image) {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //form reset method
    protected function resetForm() {
        $this->message = '';
        $this->image = null;
    }
    //ticket replies store method
    public function storeAdminTicket() {
        //form validation
        $this->validate([
            'message'=>'required|min:5|max:500',
        ]);

        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //ticket replies store to database
        $ticketReplies = new TicketReply();
        $ticketReplies->user_id = Auth::user()->id;
        $ticketReplies->ticket_id = $this->ticket_id;
        $ticketReplies->message = $this->message;
        //ticket reply image check
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(600, 350)->save('assets/images/ticket-replies/'.$imageName);
            $ticketReplies->image = $imageName;
        }
        $ticketReplies->reply_date = date('Y-m-d');
        $ticketReplies->save();
        //ticket status changed
        OpenTicket::where('id',$this->ticket_id)->update(['status'=>1]);
        $this->resetForm();
        toastr()->success('Reply sent successfully!');
    }
    //render method
    public function render()
    {
        //single ticket fetch
        $showTicket = OpenTicket::where('id',$this->ticket_id)->first();
        //all replies fetch
        $replies = TicketReply::where('ticket_id',$showTicket->id)->orderBy('id','DESC')->get();
        //view of ticket details component
        return view('livewire.admin.admin-open-ticket-details-component',['showTicket'=>$showTicket,'replies'=>$replies])->layout('layouts.master');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\OpenTicket;
use App\Models\TicketReply;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use Image;

class UserShowOpenTicketComponent extends Component
{
    //laravel file uploads
    use WithFileUploads;
    //ticket add variable
    public $ticket_id;
    public $message;
    public $image;
    //ticket id fetch mount method
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
    //customer ticket store method
    public function storeUserTicket() {
        $this->validate([
            'message'=>'required|min:5|max:500',
        ]);

        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //customer ticket store database
        $ticketReplies = new TicketReply();
        $ticketReplies->user_id = Auth::user()->id;
        $ticketReplies->ticket_id = $this->ticket_id;
        $ticketReplies->message = $this->message;
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(600, 350)->save('assets/images/ticket-replies/'.$imageName);
            $ticketReplies->image = $imageName;
        }
        $ticketReplies->reply_date = date('Y-m-d');
        $ticketReplies->save();

        OpenTicket::where('id',$this->ticket_id)->update(['status'=>0]);

        toastr()->success('Reply sent successfully!');
    }
    //render method
    public function render()
    {
        //customer single ticket fetch
        $showTicket = OpenTicket::where('id',$this->ticket_id)->first();
        //customer all ticket replies to single ticket fetch data
        $replies = TicketReply::where('ticket_id',$showTicket->id)->orderBy('id','DESC')->get();
        //view customer show open ticket component
        return view('livewire.user.user-show-open-ticket-component',['showTicket'=>$showTicket,'replies'=>$replies])->layout('layouts.master');
    }
}

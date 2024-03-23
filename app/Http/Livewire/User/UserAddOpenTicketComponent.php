<?php

namespace App\Http\Livewire\User;

use App\Models\OpenTicket;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;
use Image;

class UserAddOpenTicketComponent extends Component
{
    //laravel file uploads
    use WithFileUploads;
    //add opent ticket form variable
    public $subject;
    public $service;
    public $priority;
    public $message;
    public $image;
    public $status;
    //variable data mount method
    public function mount() {
        $this->status = 0;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'subject'=>'required|min:3|max:255',
            'service'=>'required',
            'priority'=>'required',
            'message'=>'required|min:5|max:500',
        ]);

        if($this->image) {
            $this->validateOnly($fields,[
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
    }
    //store ticket method
    public function storeTickets() {
        $this->validate([
            'subject'=>'required|min:3|max:255',
            'service'=>'required',
            'priority'=>'required',
            'message'=>'required|min:5|max:500',
        ]);
        if($this->image) {
            $this->validate([
                'image'=>'required|mimes:jpg,jpeg,png',
            ]);
        }
        //database ticket store
        $openTicket = new OpenTicket();
        $openTicket->user_id = Auth::user()->id;
        $openTicket->subject = $this->subject;
        $openTicket->service = $this->service;
        $openTicket->priority = $this->priority;
        $openTicket->message = $this->message;
        $openTicket->status = $this->status;
        $openTicket->date = date('Y-m-d');
        if($this->image) {
            $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
            Image::make($this->image)->resize(600, 350)->save('assets/images/tickets/'.$imageName);
            $openTicket->image = $imageName;
        }
        $openTicket->save();

        toastr()->success('Open Ticket create successfully!');
    }
    //render method
    public function render()
    {
        //view customer add open ticket component
        return view('livewire.user.user-add-open-ticket-component')->layout('layouts.master');
    }
}

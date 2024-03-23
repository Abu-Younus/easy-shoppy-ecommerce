<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use App\Models\ContactReply;
use Carbon\Carbon;
use Livewire\Component;

class AdminContactMessageReplyComponent extends Component
{
    //contact message reply store form variable
    public $contact_id;
    public $reply_message;
    //contact id for contact messages fetch to mount function
    public function mount($contact_id) {
        $this->contact_id = $contact_id;
    }
    //form validation updated method
    public function update($fields) {
        $this->validateOnly($fields,[
            'reply_message'=>'required|min:5|max:500',
        ]);
    }
    //contact messages reply store method
    public function sendContactMessageReply() {
        //form validation
        $this->validate([
            'reply_message'=>'required|min:5|max:500',
        ]);
        //contact messages fetch
        $contact = Contact::find($this->contact_id);
        if(!$contact->is_reply) {
            //contact messages reply store database
            $contactReply = new ContactReply();
            $contactReply->contact_id = $this->contact_id;
            $contactReply->reply_message = $this->reply_message;
            $contactReply->reply_date = Carbon::now()->format('Y-m-d g:i A');
            $contactReply->save();
            //contact message is reply ture store with database
            $contact->is_reply = true;
            $contact->save();
            toastr()->success('Reply sent successfully!');
        }
        else {
            toastr()->error('Message is already replied!');
        }
    }
    //render method
    public function render()
    {
        //contact messages fetch
        $contact = Contact::where('id',$this->contact_id)->first();
        //view of contact messages reply component
        return view('livewire.admin.admin-contact-message-reply-component',['contact'=>$contact])->layout('layouts.master');
    }
}

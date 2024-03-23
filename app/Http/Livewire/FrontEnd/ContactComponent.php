<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Contact;
use App\Models\User;
use Livewire\Component;
use Mail;

class ContactComponent extends Component
{
    //variable for sent message form
    public $name;
    public $email;
    public $phone;
    public $comment;
    //sent form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'name'=>'required|min:3|max:20',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'comment'=>'required|min:5|max:500'
        ]);
    }
    //send message method
    public function sendMessage() {
        //form validation
        $this->validate([
            'name'=>'required|min:3|max:20',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'comment'=>'required|min:5|max:500'
        ]);

        //admin data fetch
        $admin = User::where('utype','ADM')->first();

        //contact message data store with database
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();

        $this->sendContactMail($admin,$contact);

        toastr()->success('Sent successfully!', 'Congrats');
    }

    //contact message mail sent method
    public function sendContactMail($admin,$contact) {
        Mail::to($admin->email)->send(new ContactMail($admin,$contact));
    }

    //render method
    public function render()
    {
        return view('livewire.front-end.contact-component')->layout('layouts.master');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //contact messages reply check method
    public function replyCheck($id) {
        $contact = Contact::find($id);
        if($contact->is_reply) {
            toastr()->error('Message is already replied!');
        }
    }
    //render method
    public function render()
    {
        //all contact messages fetch
        $contacts = Contact::orderBy('id','DESC')->paginate(12);
        //view of contact component
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.master');
    }
}

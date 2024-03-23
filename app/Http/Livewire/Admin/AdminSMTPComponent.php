<?php

namespace App\Http\Livewire\Admin;

use App\Models\Smtp;
use Livewire\Component;

class AdminSMTPComponent extends Component
{
    //SMTP setting store form all variables
    public $mailer;
    public $host;
    public $port;
    public $username;
    public $app_key;
    //mount function of SMTP setting data retrive with database
    public function mount() {
        $smtp = Smtp::find(1);
        //SMTP setting non null check to retrive data
        if($smtp != null) {
            $this->mailer = $smtp->mailer;
            $this->host = $smtp->host;
            $this->port = $smtp->port;
            $this->username = $smtp->username;
            $this->app_key = $smtp->app_key;
        }
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'mailer'=>'required',
            'host'=>'required|email',
            'port'=>'required|numeric',
            'username'=>'required|email',
            'app_key'=>'required',
        ]);
    }
    //SMTP setting store method
    public function saveSMTP() {
        //form validation
        $this->validate([
            'mailer'=>'required',
            'host'=>'required|email',
            'port'=>'required|numeric',
            'username'=>'required|email',
            'app_key'=>'required',
        ]);
        //SMTP setting fetch
        $smtp = Smtp::find(1);
        //SMTP setting null check to new SMTP setting store with database
        if(!$smtp) {
            $smtp = new Smtp();
        }

        $smtp->mailer = $this->mailer;
        $smtp->host = $this->host;
        $smtp->port = $this->port;
        $smtp->username = $this->username;
        $smtp->app_key = $this->app_key;
        $smtp->save();

        toastr()->success('SMTP save successfully!');
    }
    //render method
    public function render()
    {
        //view of admin SMTP setting component
        return view('livewire.admin.admin-s-m-t-p-component')->layout('layouts.master');
    }
}

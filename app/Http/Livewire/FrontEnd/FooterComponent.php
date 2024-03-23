<?php

namespace App\Http\Livewire\FrontEnd;

use App\Models\Setting;
use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\Page;
use Livewire\Component;

class FooterComponent extends Component
{
    //variable for newsletter email
    public $email;
    //variable for newsletter form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'email'=>'required|email',
        ]);
    }
    //subscribe store method
    public function storeSubscribe() {
        $this->validate([
            'email'=>'required|email',
        ]);
        //check email for already subscribe
        $emailCheck = NewsLetter::where('email',$this->email)->first();

        if($emailCheck) {
            toastr()->error('You are already subscribe our web!');
        }
        else {
            $newsLetter = new NewsLetter();
            $newsLetter->email = $this->email;
            $newsLetter->save();

            toastr()->success('Thanks for subscribe us!');
        }
    }
    //render method
    public function render()
    {
        //all categories fetch
        $categories = Category::where('active_status',1)->get();
        //all pages fetch
        $pages = Page::orderBy('id','DESC')->get();
        //view footer component
        return view('livewire.front-end.footer-component',['categories'=>$categories,'pages'=>$pages]);
    }
}

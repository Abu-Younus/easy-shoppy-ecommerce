<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductQuestion;
use App\Models\QuestionReply;
use Livewire\Component;

class AdminProductQuestionReplyComponent extends Component
{
    //product question id variable to product question fetch
    public $question_id;
    //product question reply answer variable
    public $answer;
    //product question id fetch to mount function
    public function mount($question_id) {
        $this->question_id = $question_id;
    }
    //form validation updated method
    public function updated($fields) {
        $this->validateOnly($fields,[
            'answer'=>'required|min:5|max:500',
        ]);
    }
    //form reset method
    protected function resetForm() {
        $this->answer = '';
    }
    //product question reply answer store method
    public function storeAnswer() {
        $this->validate([
            'answer'=>'required|min:5|max:500',
        ]);
        //product question fetch
        $question = ProductQuestion::where('id',$this->question_id)->first();
        if(!$question->is_reply) {
            //product question reply answer store database
            $questionReply = new QuestionReply();
            $questionReply->product_question_id = $this->question_id;
            $questionReply->answer = $this->answer;
            $questionReply->save();
            //product question is reply true store database
            $question->is_reply = true;
            $question->save();
            $this->resetForm();
            toastr()->success('Replied successfully!');
        }
        else {
            toastr()->error('This question answer already added!');
        }
    }
    //render method
    public function render()
    {
        //product question fetch
        $question = ProductQuestion::where('id',$this->question_id)->first();
        //view of product question reply answer component
        return view('livewire.admin.admin-product-question-reply-component',['question'=>$question])->layout('layouts.master');
    }
}

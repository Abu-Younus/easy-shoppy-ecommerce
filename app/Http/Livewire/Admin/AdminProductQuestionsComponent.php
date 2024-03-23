<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductQuestion;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductQuestionsComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //product questions search for variables
    public $status;
    public $date;
    //product question reply check method
    public function replyCheck($id) {
        $question = ProductQuestion::find($id);
        if($question->is_reply) {
            toastr()->error('This question answer already added!');
        }
    }
    //product question delete method
    public function deleteQuestion($id) {
        $question = ProductQuestion::find($id);
        $question->delete();

        toastr()->success('Question deleted successfully!');
    }
    //render method
    public function render()
    {
        //search for product question with status and date
        if($this->status == 'pending') {
            $questions = ProductQuestion::where('is_reply', 0)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->status == 'replied') {
            $questions = ProductQuestion::where('is_reply', 1)->orderBy('id','DESC')->paginate(12);
        }
        else if($this->date) {
            $questions = ProductQuestion::where('date', $this->date)->orderBy('id','DESC')->paginate(12);
        }
        else {
            $questions = ProductQuestion::orderBy('id','DESC')->paginate(12);
        }
        //view of product questions component
        return view('livewire.admin.admin-product-questions-component',['questions'=>$questions])->layout('layouts.master');
    }
}

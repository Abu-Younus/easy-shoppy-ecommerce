<?php

namespace App\Http\Livewire\Admin;

use App\Models\OpenTicket;
use Livewire\Component;
use Livewire\WithPagination;

class AdminShowOpenTicketComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //ticket search variables
    public $type;
    public $status;
    public $date;
    //ticket delete method
    public function deleteTicket($id) {
        $ticket = OpenTicket::find($id);
        $ticket->delete();

        toastr()->success('Ticket deleted successfully!');
    }
    //render method
    public function render()
    {
        //ticket search to ticket type, ticket status and date
        if($this->type == 'technical') {
            $tickets = OpenTicket::where('service',$this->type)->orderBy('id','DESC')->paginate(10);
        } else if($this->type == 'payment') {
            $tickets = OpenTicket::where('service',$this->type)->orderBy('id','DESC')->paginate(10);
        } else if($this->type == 'affiliate') {
            $tickets = OpenTicket::where('service',$this->type)->orderBy('id','DESC')->paginate(10);
        } else if($this->type == 'return') {
            $tickets = OpenTicket::where('service',$this->type)->orderBy('id','DESC')->paginate(10);
        } else if($this->type == 'refund') {
            $tickets = OpenTicket::where('service',$this->type)->orderBy('id','DESC')->paginate(10);
        } else if($this->status == '0') {
            $tickets = OpenTicket::where('status',$this->status)->orderBy('id','DESC')->paginate(10);
        } else if($this->status == '1') {
            $tickets = OpenTicket::where('status',$this->status)->orderBy('id','DESC')->paginate(10);
        } else if($this->status == '2') {
            $tickets = OpenTicket::where('status',$this->status)->orderBy('id','DESC')->paginate(10);
        } else if($this->date) {
            $tickets = OpenTicket::where('date',$this->date)->orderBy('id','DESC')->paginate(10);
        } else {
            $tickets = OpenTicket::orderBy('id','DESC')->paginate(10);
        }
        //view of ticket show component
        return view('livewire.admin.admin-show-open-ticket-component',['tickets'=>$tickets])->layout('layouts.master');
    }
}

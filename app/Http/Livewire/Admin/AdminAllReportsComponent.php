<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OpenTicket;
use Livewire\Component;
use Livewire\WithPagination;
use Pdf;

class AdminAllReportsComponent extends Component
{
    //laravel pagination use
    use WithPagination;
    //order status, ordered date and payment mode variable for search order details report
    public $order_status;
    public $ordered_date;
    public $payment_mode;
    //stock status and product status variable for search products report
    public $stock_status;
    public $product_status;
    //ticket type, ticket status and date variable for search tickets report
    public $ticket_type;
    public $ticket_status;
    public $date;
    //order invoice report generate method
    public function orderInvoice($order_id) {
        $order = Order::where('order_id',$order_id)->first();

        $pdf = Pdf::loadView('livewire.admin.admin-order-invoice',['order'=>$order]);
        return $pdf->stream('order-invoice.pdf');
    }
    //all orders report generate method
    public function allOrdersReport() {
        $orders = Order::orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('livewire.admin.admin-all-orders-report',['orders'=>$orders]);
        return $pdf->stream('all-orders-report.pdf');
    }
    //all products report generate method
    public function allProductsStockReport() {
        $products = Product::orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('livewire.admin.admin-all-products-stock-report',['products'=>$products]);
        return $pdf->stream('all-products-stock-report.pdf');
    }
    //all tickets report generate method
    public function allTicketsReport() {
        if($this->ticket_type) {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->get();
        }
        if($this->ticket_status) {
            $tickets = OpenTicket::where('status',$this->ticket_status)->orderBy('id','DESC')->get();
        }
        if($this->date) {
            $tickets = OpenTicket::where('date',$this->date)->orderBy('id','DESC')->get();
        }

        $tickets = OpenTicket::orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('livewire.admin.admin-all-tickets-report',['tickets'=>$tickets]);
        return $pdf->stream('all-tickets-report.pdf');
    }
    //render method
    public function render()
    {
        //searach for order status, ordered date and payment mode
        if($this->order_status == 'pending') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'ordered') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'packed') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'shipped') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'delivered') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'refund') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->order_status == 'canceled') {
            $orders = Order::where('status',$this->order_status)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->ordered_date) {
            $orders = Order::where('ordered_date',$this->ordered_date)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->payment_mode == 'cod') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->payment_mode == 'card') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->payment_mode == 'bkash') {
            $orders = Order::where('payment_mode', $this->payment_mode)->orderBy('id','DESC')->paginate(10);
        }
        else {
            $orders = Order::orderBy('id','DESC')->paginate(10);
        }
        //search for stock status and product status
        if($this->stock_status == 'instock') {
            $products = Product::where('quantity','>=',1)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->stock_status == 'outofstock') {
            $products = Product::where('quantity','<',1)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->product_status == 'active') {
            $products = Product::where('status', 1)->orderBy('id','DESC')->paginate(10);
        }
        else if($this->product_status == 'inactive') {
            $products = Product::where('status', 0)->orderBy('id','DESC')->paginate(10);
        }
        else {
            $products = Product::orderBy('id','DESC')->paginate(10);
        }
        //search for ticket type, ticket status and date
        if($this->ticket_type == 'technical') {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_type == 'payment') {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_type == 'affiliate') {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_type == 'return') {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_type == 'refund') {
            $tickets = OpenTicket::where('service',$this->ticket_type)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_status == '0') {
            $tickets = OpenTicket::where('status',$this->ticket_status)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_status == '1') {
            $tickets = OpenTicket::where('status',$this->ticket_status)->orderBy('id','DESC')->paginate(10);
        } else if($this->ticket_status == '2') {
            $tickets = OpenTicket::where('status',$this->ticket_status)->orderBy('id','DESC')->paginate(10);
        } else if($this->date) {
            $tickets = OpenTicket::where('date',$this->date)->orderBy('id','DESC')->paginate(10);
        } else {
            $tickets = OpenTicket::orderBy('id','DESC')->paginate(10);
        }
        //view of all reports component
        return view('livewire.admin.admin-all-reports-component',['orders'=>$orders,'products'=>$products,'tickets'=>$tickets])->layout('layouts.master');
    }
}

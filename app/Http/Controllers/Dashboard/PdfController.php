<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    public function view($id)
    {
        $order=Order::find($id);
        return view('admin.Pdf.view',compact('order'));
    }
    public function create($id)
    {
        $order=Order::find($id);
        $data=['order'=>$order];
        $pdf = Pdf::loadView('admin.Pdf.view', $data);
        return $pdf->download('invoice'.$order->id.'-'.Carbon::now()->format('d-m-Y').'.pdf');
    }
    public function sendEmail($id)
    {
        $order=Order::find($id);
        try{
            Mail::to("doaabakhiet11@gmail.com")->send(new InvoiceOrderMailable($order));
            return redirect()->back()->with('status','Email Invoice Send SUCCESSFULLY');
        }catch(\Exception $e){
            return redirect()->back()->with('status',"Email Invoice doesn't Send");
        }
    }
}

<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;
class Checkout extends Component
{
    public $carts,$totalProductAmount=0;
    public $full_name,$email,$phone,$pincode,$address,$payment_mode=null,$payment_id=null,$order;
    protected $listeners=['ValidationPaymentForm','transactionEmit'=>'paidOnlineOrder'];
    public function ValidationPaymentForm()
    {
        $this->validate();
    }
    public function paidOnlineOrder($transaction_id)
    {
        $this->payment_id=$transaction_id;  
        $this->payment_mode="Paid By PayPal";
        $codOrder=$this->placeOrder();
        if($codOrder){
            Cart::where('user_id',auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => '200'
            ]);
            return redirect()->to('thank-you');
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => '409'
            ]);
        }
    }
    public function rules()
    {
        return [
            'full_name'=>'required|string|max:121',
            'email'=>'required|email',
            'phone'=>'required|string|max:11|min:10',
            'pincode'=>'required|string|max:6',
            'address'=>'required|string|max:500',
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $this->order=Order::create([
            'user_id'=>auth()->user()->id,
            'tracking_number'=>'funda'.Str::random(10),
            'full_name'=>$this->full_name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'pincode'=>$this->pincode,
            'address'=>$this->address,
            'status_message'=>'In Progress',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id
        ]);
        foreach($this->carts as $item){
            $orderItems=OrderItem::create([
                'order_id'=>$this->order->id,
                'product_id'=>$item->product_id,
                'color_id'=>$item->color_id,
                'price'=>$item->quantity,
                'quantity'=> $item->products->selling_price * $item->quantity
            ]);
            if($item->color_id !=null){
                $cartQty=Product::find($item->product_id)->colors()->where('colors.id',$item->color_id)->first()->pivot->decrement('color_quantity',$item->quantity);
            }else{
                $item->products->where('id',$item->product_id)->decrement('quatity',$item->quantity);
            }
         }
         return true;
        
    }
    public function cachOnDeliveryOrder()
    {
        $this->payment_mode="Cach On Delivery";
        $codOrder=$this->placeOrder();
        if($codOrder){
            Cart::where('user_id',auth()->user()->id)->delete();
            try{
                // $order=Order::find($this->order->id);
                Mail::to("doaabakhiet11@gmail.com")->send(new PlaceOrderMailable($this->order));
            }catch(\Exception $ex){

            }
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => '200'
            ]);
            return redirect()->to('thank-you');
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => '409'
            ]);
        }
    }
    public function TotalProductAmount()
    {
        $this->carts = Cart::where('user_id',auth()->user()->id)->get();
        foreach($this->carts as $item){
           $this->totalProductAmount= $item->products->selling_price * $item->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->full_name=auth()->user()->name;
        $this->email=auth()->user()->email;
        $this->phone=auth()->user()->userDetails->phone;
        $this->pincode=auth()->user()->userDetails->pincode;
        $this->address=auth()->user()->userDetails->address;
        $this->totalProductAmount=$this->TotalProductAmount();
        return view('livewire.frontent.product.checkout',['totalProductAmount'=>$this->totalProductAmount]);
    }
}

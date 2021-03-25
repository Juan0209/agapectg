<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShoppingController extends Controller
{
    public function payment($message, $dissable)
    {
        $id = Auth::id();
        $order = Order::all()->where('user_id', $id )->where('state', 1)->first();
        $bill_id1 = $order->bill_id;
        $order = Order::all()->where('user_id', $id )->where('state', 1)->last();
        $bill_id2 = $order->bill_id;

        if ($bill_id1 == $bill_id2){

            $bill_id = $bill_id1;

        }else{

            if ($bill_id1 != null){

                $bill_id = $bill_id1;
            }else{
                $bill_id = $bill_id2;
            }

            $order = Order::select('orders.*')->where('user_id', $id )->where('state', 1)->get();

            foreach ($order as $product){
                $id = $product->id;

                $app = Order::find($id);
                $app->bill_id = $bill_id;
                $app->save();
            }
        }

        if ($bill_id != null){

            $bill = Bill::all()->where('id', $bill_id)->last();

            $order = DB::Table('orders')
                ->join('products', 'orders.product_id','=', 'products.id')
                ->select( 'products.name as name', 'orders.quantity as quantity', 'orders.total as total')
                ->where('user_id', $id)
                ->where('state',1)
                ->where('bill_id',$bill->id)
                ->get();

            $payed = $bill->payed;
            if ($payed == 0){

                return view('order.payment', compact('order', 'message', 'dissable'));
                die();
            }elseif ($payed == 1 ){

                $payed = true;
                return view('order.payment', compact('order', 'payed', 'message', 'dissable'));
                die();
            }

        }else{

            $newBill            = new Bill;
            $newBill->user_id   = $id;
            $newBill->payed     = 0;
            $newBill->save();

            $bill = $bill = Bill::all()->where('user_id', $id)->last();
            $bill_id = $bill->id;

            foreach ($order as $product){
                $id = $product->id;

                $app = Order::find($id);
                $app->bill_id = $bill_id;
                $app->save();
            }

            return redirect('/payment/bill/0/0');
            die();
        }
    }

    public function productCart(Request $request)
    {
        if (Auth::user()) {

            $request->validate([
                'id_product' => 'required',
                'quantity' => 'required',
                'file' => 'required|mimes:jpeg,jpg,png|min:20',
            ]);

            $imagenes = $request->file('file')->store('public/imagenes');
            $url = storage::url($imagenes);

            $sale = new Order;

            $sale->user_id = Auth::id();
            $sale->product_id = $request->id_product;
            $sale->image = $url;
            $sale->quantity = $request->quantity;
            $sale->total = $request->quantity * $request->price;
            $sale->state = '1';

            $sale->save();

            return redirect('/cart');
        }else{
            return back();
        }
    }

    public function cart()
    {
        $id = Auth::id();
        $order = DB::Table('orders')
                ->join('products', 'orders.product_id','=', 'products.id')
                ->select('products.image as productImage', 'products.name as name', 'orders.image as image','orders.quantity as quantity', 'orders.total as total')
                ->where('user_id', $id)
                ->where('state',1)
                ->get();


        return view('order.cart', compact('order'));
    }

    public function confirmation()
    {
        $id = Auth::id();
        $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();;

        $order = DB::Table('orders')
            ->join('products', 'orders.product_id','=', 'products.id')
            ->select('products.name as name','orders.quantity as quantity', 'orders.total as total')
            ->where('user_id', $id)
            ->where('state',1)
            ->get();

        return view('order.confirmation', compact('order', 'bill'));
    }

    public function response(Request $request){

        return view('order.response', compact('request'));
    }

    public function transaccion($transaccion, $referencia){
        if ($transaccion == 0 or $referencia == 1){ //consultar

            if ($referencia == 0){

                $id = Auth::id();
                $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();

                if (empty($bill[0]) or $bill[0]->ref_epayco == null ){

                    return redirect("/payment/bill/0/0" );
                    die();
                }else{

                    $referencia = $bill[0]->ref_epayco;

                    return view('order.consultaTransaccion', compact('referencia'));
                    die();
                }
            }

            if ($transaccion == 1){ //transaccion aceptada

                $id = Auth::id();
                $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();;
                $id = $bill[0]->id;

                if ($bill[0]->payed == 0) {

                    $app = Bill::find($id);
                    $app->payed = 1;
                    $app->save();
                }

                $message = 'La transacción ha sido exitosa, por favor continue con su pedido';
                $dissable = 0;

            }elseif ($transaccion == 2) { //transaccion rechazada

                $message = 'Su Transacción fue rechazada, intente realizar una nueva para continuar con la compra.';
                $dissable = 0;

            }elseif($transaccion == 3){ //transaccion pendiente

                $message = 'Su transacción esta en estado: PENDIENTE. para poder continuar es necesario que realize el pago antes de 24 horas. Una vez el pago sea confirmado la plataforma le permitira continuar con la compra.';
                $dissable = 1;

            }elseif($transaccion == 4){ // transaccion cancelada

                $message = 0;
                $dissable = 0;
            }

            return redirect("/payment/bill/$message/$dissable");
            die();

        }elseif ($transaccion == 1){ //guardar referencia de pago
            $id = Auth::id();
            $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();;
            $id = $bill[0]->id;

            $app = Bill::find($id);
            $app->ref_epayco = $referencia;
            $app->save();

            return redirect('payment/transaccion/0/0');
            die();
        }
    }

    /*public function transaccion($transaccion){

        if ($transaccion == 1){ //transaccion aceptada

            $id = Auth::id();
            $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();;
            $id = $bill[0]->id;

            $app = Bill::find($id);
            $app->payed = 1;
            $app->save();

            $message = 'La transacción ha sido exitosa, por favor continue con su pedido';

        }elseif ($transaccion == 2) { //transaccion rechazada

            $message = 'Su Transacción fue rechazada, intente realizar una nueva para continuar con la compra.';

        }elseif($transaccion == 3){ //transaccion pendiente

            $message = 'Su transacción esta en estado: PENDIENTE, para poder continuar realize el pago antes de 12 horas. Una vez realize el pago la plataforma le habilitara continuar despues de 12 a 24 horas de haber realizado el pago. Si despues de haber pasado 24 horas de haber realizado el pago la plataforma no le permite continuar con el pedido, por favor pongase en contcto con agape';

        }elseif($transaccion == 4){ // transaccion cancelada

            $message = 0;
        }

        return redirect("/payment/bill/$message" );
    }*/

    public function confirmationPay(Request $request){

        $id = Auth::id();
        $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();;
        $id = $bill[0]->id;

        $app = Bill::find($id);
        $app->name2 = $request->name2;
        $app->phone2 = $request->phone2;
        $app->add2 = $request->add2;
        $app->message = $request->message;
        $app->details = $request->details;
        $app->save();

        return redirect('/confirmation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelPurchase($id)
    {
        $records = DB::table('orders')->where('user_id', '=', $id)->get()->toArray();
        foreach ($records as $fact){
            $recordsCancel = Order::find($fact->id);
            $recordsCancel->delete();
        }

        return back();
    }
}

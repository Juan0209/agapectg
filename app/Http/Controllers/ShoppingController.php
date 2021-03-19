<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{

    public function payment($message)
    {
        $id = Auth::id();
        $order = Order::all()->where('user_id', $id)->first();
        $bill_id = $order->bill_id;
        $bill = Bill::all()->where('id', $bill_id)->last();

        if ($bill != null){
            $payed = $bill->payed;
            if ($payed == 0){
                $order = Order::select('orders.*')->where('user_id', '=', $id )->get();
                return view('order.payment', compact('order', 'message'));
                die();
            }elseif ($payed == 1 ){
                $order = Order::select('orders.*')->where('user_id', '=', $id )->get();
                $payed = true;
                return view('order.payment', compact('order', 'payed', 'message'));
                die();
            }
        }elseif($bill == null){
            $newBill            = new Bill;
            $newBill->user_id   = $id;
            $newBill->payed     = 0;

            $newBill->save();

            return redirect('/payment');
            die();
        }
    }

    public function productCart(Request $request)
    {
        $request->validate([
            'id_user'    => 'required',
            'id_product' => 'required',
            'name'       => 'required',
            'image'      => 'required',
            'quantity'   => 'required',
            'price'      => 'required',
        ],
            [
                'quantity.required'   => 'El campo cantidad es obligatoria',
            ]);

        $sale = new Order;

        $sale->user_id=$request->id_user;
        $sale->product_id=$request->id_product;
        $sale->name=$request->name;
        $sale->image=$request->image;
        $sale->image=$request->image;
        $sale->quantity=$request->quantity;
        $sale->total=$request->quantity*$request->price;
        $sale->state='1';

        $sale->save();

        return redirect('/cart');
    }

    public function cart()
    {
        $user = Auth::user();
        $id = Auth::id();
        $order = Order::select('orders.*')->where('user_id', '=', $id )->get();
        return view('order.cart', compact('order'));
    }

    public function confirmation()
    {
        $order = Order::all();
        return view('order.confirmation', compact('order'));
    }

    public function confirmationPay(Request $request)
    {
        return view('order.confirmationPay', compact('request'));
    }

    public function response(Request $request){

        return view('order.response', compact('request'));
    }

    public function transaccion($transaccion){

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function destroy($id)
    {
        //
    }
}

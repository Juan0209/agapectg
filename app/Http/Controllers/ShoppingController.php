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
    public function payment($message, $hidden)
    {
        $id = Auth::id();
        $bill = Bill::all()->where('user_id', $id)->last();

        if (isset($bill) and $bill->payed == 1){

            $bill_id1 = $bill->id;
            $bill_id2 = $bill->id;
        }else {

            $order = Order::all()->where('user_id', $id)->where('state', 1)->first();
            $bill_id1 = $order->bill_id;
            $order = Order::all()->where('user_id', $id)->where('state', 1)->last();
            $bill_id2 = $order->bill_id;
        }

        if ($bill_id1 == $bill_id2){

            $bill_id = $bill_id1;

        }else{

            if ($bill_id2 != null){

                $bill_id = $bill_id2;
            }else{
                $bill_id = $bill_id1;
            }

            $order = Order::select('orders.*')->where('user_id', $id )->where('state', 1)->get();

            foreach ($order as $product){
                $id = $product->id;

                $app = Order::find($id);
                $app->bill_id = $bill_id;
                $app->save();
            }

            return redirect('/payment/bill/0/0');
            die();
        }

        if ($bill_id != null){

            $bill = Bill::all()->where('id', $bill_id)->last();

            $order = DB::Table('orders')
                ->join('products', 'orders.product_id','=', 'products.id')
                ->select( 'products.name as name', 'orders.quantity as quantity', 'orders.total as total')
                ->where('user_id', $id)
                ->where('bill_id',$bill->id)
                ->get();

            $payed = $bill->payed;

            if ($payed == 0){

                return view('order.payment', compact('order', 'message', 'hidden'));
                die();
            }elseif ($payed == 1 ){

                $payed = true;
                return view('order.payment', compact('order', 'payed', 'message', 'hidden'));
                die();
            }

        }else{

            $newBill            = new Bill;
            $newBill->user_id   = $id;
            $newBill->payed     = 0;
            $newBill->save();

            $bill = $bill = Bill::all()->where('user_id', $id)->last();
            $bill_id = $bill->id;

            $order = Order::select('orders.*')->where('user_id', $id )->where('state', 1)->get();

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

            $id = Auth::id();
            $order = Order::select('orders.*')->where('user_id', $id )->where('state', 2)->get();

            if ( $order != '[]'){
                return back()->with(['danger' => '¡Tienes una factura pendiente!, terminala para poder realizar otro pedido.']);
                die();
            }

            $request->validate([
                'id_product' => 'required',
                'quantity' => 'required',
                'peoples' => 'required',
                'file' => 'required|mimes:jpeg,jpg,png|min:20',
            ]);

            $imagenes = $request->file('file')->store('public/imagenes');
            $url = storage::url($imagenes);

            $sale = new Order;

            $sale->user_id = Auth::id();
            $sale->product_id = $request->id_product;
            $sale->image = $url;
            $sale->peoples = $request->peoples;
            $sale->quantity = $request->quantity;
            $peoples = $request->peoples * 5000;
            $sale->total = $request->quantity * $request->price + $peoples;
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
                ->select('orders.id as id', 'products.image as productImage', 'products.name as name', 'orders.image as image','orders.quantity as quantity', 'orders.total as total')
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
            ->where('state',3)
            ->where('bill_id',$bill[0]->id)
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
                $bill = DB::table("bills")->where("user_id",$id)->where("payed",0)->orderby('id','DESC')->take(1)->get();

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
                $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();
                $id = $bill[0]->id;

                if ($bill[0]->payed == 0) {

                    $app = Bill::find($id);
                    $app->payed = 1;
                    $app->save();

                    $orders = DB::table("orders")->where("bill_id",$id)->get();

                    if ($orders[0]->state == 1 or $orders[0]->state == 2) {
                        foreach ($orders as $product) {
                            $id = $product->id;

                            $app = Order::find($id);
                            $app->state = 3;
                            $app->save();
                        }
                    }
                }

                $message = 'La transacción ha sido exitosa, por favor continue con su pedido';
                $hidden = 0;

            }elseif ($transaccion == 2) { //transaccion rechazada

                $message = 'Su Transacción fue rechazada, intente realizar una nueva para continuar con la compra.';
                $hidden = 0;

            }elseif($transaccion == 3){ //transaccion pendiente

                $id = Auth::id();
                $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();
                $id = $bill[0]->id;

                $orders = DB::table("orders")->where("bill_id",$id)->get();

                if ($orders[0]->state == 1) {
                    foreach ($orders as $product) {
                        $id = $product->id;

                        $app = Order::find($id);
                        $app->state = 2;
                        $app->save();
                    }
                }

                $message = 'Su transacción esta en estado: PENDIENTE. para poder continuar es necesario que realize el pago antes de 24 horas. Una vez el pago sea confirmado la plataforma le permitira continuar con la compra.';
                $hidden = 1;

            }elseif($transaccion == 4){ // transaccion cancelada

                $message = 0;
                $hidden = 0;
            }

            return redirect("/payment/bill/$message/$hidden");
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

    public function confirmationPay(Request $request){

        $id = Auth::id();
        $bill = DB::table("bills")->where("user_id",$id)->orderby('id','DESC')->take(1)->get();
        $id = $bill[0]->id;

        $app = Bill::find($id);
        $app->total_price = $request->total_price;
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

    public function cancelProduct($id)
    {
        $recordsCancel = Order::find($id);
        $recordsCancel->delete();

        return back();
    }

    public function orders()
    {
        $orders = DB::Table('bills')
            ->join('users', 'bills.user_id','=', 'users.id')
            ->select('users.name as name','users.phone as phone', 'bills.id as id', 'bills.total_price as total')
            ->where('payed', 0)
            ->get();

        return view('order.orders', compact('orders'));
    }

    public function order($id, $mode)
    {
        $bill_id = $id;
        $dates = DB::Table('bills')
            ->join('users', 'bills.user_id','=', 'users.id')
            ->select('users.name as name','users.phone as phone', 'users.address as address', 'bills.id as id', 'bills.name2 as name2', 'bills.phone2 as phone2','bills.add2 as add2', 'bills.message as message', 'bills.details as details', 'bills.updated_at as updated_at')
            ->where('bills.id', $bill_id)
            ->where('payed', 0) /*editar*/
            ->get();

        $orders = DB::Table('orders')
            ->join('products', 'orders.product_id','=', 'products.id')
            ->select('products.name as name','orders.quantity as quantity', 'orders.image as image', 'orders.peoples as peoples')
            ->where('state', 1)/*editar*/
            ->where('bill_id', $bill_id)
            ->get();

        $mod = $mode;

        foreach ($dates as $date){/*editar*/

            if ($date->name2 != null) {
                return 'date is good';
            } else {
                /*return redirect('/orders');*/
                return view('order.orderSingle', compact('date', 'orders', 'mod'));
            }
        }
    }

    public function delivery(){
        $deliveries = DB::Table('bills')
            ->join('users', 'bills.user_id','=', 'users.id')
            ->select('users.name as name','users.address as address','users.phone as phone', 'bills.id as id', 'bills.total_price as total', 'bills.name2 as name2', 'bills.phone2 as phone2','bills.add2 as add2')
            ->where('payed', 0)/*editar*/
            ->get();

        return view('order.delivery', compact('deliveries'));
    }
    public function confirmationDelivery(){
        $deliveries = DB::Table('bills')
            ->join('users', 'bills.user_id','=', 'users.id')
            ->select('users.name as name', 'users.id as id_user','users.address as address','users.phone as phone', 'bills.id as id', 'bills.total_price as total', 'bills.name2 as name2', 'bills.phone2 as phone2','bills.add2 as add2')
            ->where('payed', 0)/*editar*/
            ->get();

        $products = DB::Table('orders')
            ->join('products', 'orders.product_id','=', 'products.id')
            ->select('products.name as name','orders.quantity as quantity','orders.peoples as peoples', 'orders.user_id as user_id')
            ->where('state', 1)/*editar*/
            ->get();

        return view('order.confirmationDelivery', compact('deliveries', 'products'));
    }
    public function bill()
    {
        $orders = DB::Table('bills')
            ->join('users', 'bills.user_id','=', 'users.id')
            ->select('users.name as name','users.phone as phone', 'bills.id as id', 'bills.total_price as total')
            ->where('payed', 0)
            ->get();

        return view('order.bill', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('user.home', compact('product'));
    }

    public function view()
    {
        $user = User::select("id", "name", "email", "address", "phone", "created_at")
            ->where('rol','=','admin')
            ->get();
        return view('user.tableOfficials', compact('user') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'address'    => 'required',
            'phone'      => 'required',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8|confirmed',
            'rol'        => 'required|string',
        ]);

        $newAdmin = new User;

        $newAdmin->name=$request->name;
        $newAdmin->address=$request->address;
        $newAdmin->phone=$request->phone;
        $newAdmin->email=$request->email;
        $newAdmin->password=Hash::make($request['password']);
        $newAdmin->rol=$request->rol;

        $newAdmin->save();

        return back();

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;

        if (!empty($request->password) or !is_null($request->password) or $request->password != '') {
            $user->password = Hash::make($request->name);
        }
        $user->save();

        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function users()
    {
        $users = User::all();

        return view('user.tableUsers', compact('users'));
    }
}

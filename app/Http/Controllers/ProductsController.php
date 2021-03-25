<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.products',compact ("products"));
    }

    public function productList($id)
    {
        $products = Product::select('id','name', 'image', 'description', 'price')
            ->where('id', '=', $id)
            ->get();
        return view('product.productslist', compact('products'));
    }

    public function catalogues($catalogue)
    {
        $products = Product::select("id","name","description","image","price","catalogues_id")
            ->where('catalogues_id','=',$catalogue)
            ->get();
        return view('product.products', compact("products"));
    }

    public function crud()
    {
        $cruds=Product::all();
        return view('product.crud',compact('cruds'));
    }
    /*public function edit($id)
    {
        $cruds=Product::find($id);
        return view('crud.edit',compact('cruds','id'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'catalogues_id'=>'required',
        ]);

        $cruds= new Product;

        $cruds->id=$request->input('id');
        $cruds->name=$request->input('name');
        $cruds->description=$request->input('description');
        $cruds->price=$request->input('price');
        $cruds->image=$request->input('image');
        $cruds->catalogues_id=$request->input('catalogues_id');

        $cruds->save();

        return redirect('/crud')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        return view('product.crud');
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
        'id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'required',
        ]);

        $id= $request->input('id');

        $cruds=Product::find($id);

        $cruds->id = $request->input('id');
        $cruds->name = $request->input('name');
        $cruds->description = $request->input('description');
        $cruds->price = $request->input('price');
        $cruds->image = $request->input('image');

        $cruds->save();

        return redirect('/crud')->with('success','Data update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id= $request->input('id');

        $cruds=Product::find($id);
         $cruds->delete();

         return redirect('/crud')->with('success','Data Deleted');

    }
}

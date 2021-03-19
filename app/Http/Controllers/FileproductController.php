<?php

namespace App\Http\Controllers;

use App\Models\Fileproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('files.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    'file'=> 'required|mimes:jpeg,jpg,png|max:1024'
         ]);

        $imagenes= $request->file('file')->store('public/imagenes');
        $url= storage::url($imagenes);

       Fileproduct::create([
       'url' => $url
       ]);

       return view('product.fileproducts ',compact('imagenes','url'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fileproduct  $fileproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Fileproduct $fileproduct)
    {
        return view('product.fileproducts');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fileproduct  $fileproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Fileproduct $fileproduct)
    {
        //return view('files.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fileproduct  $fileproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fileproduct $fileproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fileproduct  $fileproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fileproduct $fileproduct)
    {
        //
    }
}

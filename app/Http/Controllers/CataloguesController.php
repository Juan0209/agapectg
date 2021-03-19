<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class CataloguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function catalogues(Catalogue $catalogues){

        //$catalogues = Catalogue::all();
        $category = Catalogue::where('catalogues_id',$catalogues->id)
            ->where('id',1);

        return view('layouts/mugs', compact('category','catalogues'));
    }
    public function camisas(Product $catalogues)
    {
        $camisas = Catalogue::where('catalogues_id',$catalogues->id)
            ->where('id',2);
        return view('layouts/camisas', compact('camisas','catalogues'));


    }

    public function portare()
    {
        return view('layouts/portare');
    }

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
    public function destroy($id)
    {
        //
    }
}

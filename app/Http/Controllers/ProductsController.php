<?php

namespace App\Http\Controllers;

use App\Models\Fileproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($catalogue == 1){
            $category = 'Promociones';
        }elseif ($catalogue == 2){
            $category = 'Productos Temporales';
        }elseif ($catalogue == 3){
            $category = 'Mugs';
        }elseif ($catalogue == 4){
            $category = 'Camisas';
        }elseif ($catalogue == 5){
            $category = 'Portaretratos';
        }else{
            $category = 'Cuadros';
        }

        return view('product.products', compact("products", 'category'));
    }

    public function crud()
    {
        $cruds=Product::all();
        return view('product.crud',compact('cruds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'catalogues_id'=>'required',
            'image'=> 'required|mimes:jpeg,jpg,png'
        ]);

        $imagenes= $request->file('image')->store('public/productos');
        $url= storage::url($imagenes);

      $cruds= Product::create([
        'image' => $url,
       'name'=>$request->input('name'),
       'description'=>$request->input('description'),
       'price'=>$request->input('price'),
       'catalogues_id'=>$request->input('catalogues_id'),
       ]);
       $cruds->save();

        return redirect('/crud')->with('success','Data Added');
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'catalogues_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $id= $request->input('id');

        $cruds=Product::find($id);

        if (!is_null($request->file('image'))) {
            $url = str_replace('storage', 'public', $cruds->image);
            Storage::delete($url);

            $imagenes= $request->file('image')->store('public/productos');
            $url= storage::url($imagenes);
            $cruds->image = $url;
        }
        $cruds->name = $request->input('name');
        $cruds->description = $request->input('description');
        $cruds->catalogues_id = $request->input('catalogues_id');
        $cruds->price = $request->input('price');
       $cruds->save();

        return redirect('/crud')->with('success','Data Added');
    }

    public function destroy(request $request)
    {
        $id= $request->input('id');

        $cruds=Product::find($id);
        $url = str_replace('storage', 'public', $cruds->image);
        Storage::delete($url);
        $cruds->delete();

         return redirect('/crud')->with('success','Data Deleted');

    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        $querys = Product::where('name', 'LIKE', '%' . $term . '%')->get();

        $data = [];

        foreach ($querys as $query){
            $data[] = [
                'label' => $query->name
            ];
        }

        return $data;
    }

    public function consult(Request  $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->get();
        $search = $request->search;

        return view('product.products', compact("products", 'search'));
    }
}

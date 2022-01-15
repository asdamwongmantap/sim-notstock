<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all product
        $data_products = \App\Models\Product::all();
        return view('products/listproducts',['data_product' => $data_products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add product
        return view('products/addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //process add product
        $lastID = \App\Models\Product::create($request->all());
        $created_atawal = \Carbon\Carbon::now();
        $updated_atawal = \Carbon\Carbon::now();
        $created_at = \Carbon\Carbon::parse($created_atawal)->format('d/m/Y');
        $updated_at = \Carbon\Carbon::parse($updated_atawal)->format('d/m/Y');

        $dd1 = substr($created_at,0,2);
        $mm1 = substr($created_at,3,2);
        $yyyy1 = substr($created_at,6,4);
        $tgl1 = $yyyy1."-".$mm1."-".$dd1;

        $dd2 = substr($updated_at,0,2);
        $mm2 = substr($updated_at,3,2);
        $yyyy2 = substr($updated_at,6,4);
        $tgl2 = $yyyy2."-".$mm2."-".$dd2;

        DB::table('stocks')->insert(
            ['product_id' => $lastID->product_id,'qty_available' => '1',
            'created_by'=> $request->created_by,
            'updated_by'=> $request->updated_by,
            'created_at'=> $tgl1,'updated_at'=> $tgl2]
        );
        return 'berhasil';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get detail product
        $data_product = \App\Models\Product::find($id);
        return view('products/detailproduct',['data_product' => $data_product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get edit product
        $data_product = \App\Models\Product::find($id);
        return view('products/editproduct',['data_product' => $data_product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update detail product
        $data_product = \App\Models\Product::find($id);
        $data_product->update($request->all());
        return 'berhasil';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete product
        $product = \App\Models\Product::find($id);
        $product->delete();
        return 'berhasil';
    }
}

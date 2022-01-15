<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all product
        // $data_stocks = \App\Models\Stock::all();
        $data_stocks = DB::table('stocks')
            ->join('products', 'products.product_id', '=', 'stocks.product_id')
            ->select('stocks.id','stocks.product_id','products.product_name', 'stocks.qty_available')
            ->get();
        return view('stocks/liststocks',['data_stock' => $data_stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //add product
        return view('stocks/addstock');
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
        \App\Models\Stock::create($request->all());
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
        $data_stock = \App\Models\Stock::find($id);
        return view('stocks/detailstock',['data_stock' => $data_stock]);
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
        $data_stock = \App\Models\Stock::find($id);
        return view('stocks/editstock',['data_stock' => $data_stock]);
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
        $data_stock = \App\Models\Stock::find($id);
        $data_stock->update($request->all());
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
        $product = \App\Models\Stock::find($id);
        $product->delete();
        return 'berhasil';
    }
}

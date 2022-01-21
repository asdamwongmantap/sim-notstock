<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Mail\NotifMessageEmail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editqty($id)
    {
        //get edit product
        $data_stock = \App\Models\Product::find($id);
        return view('stocks/editstock',['data_stock' => $data_stock]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateqty(Request $request, $id)
    {
        //update detail product
        DB::table('products')
              ->where('product_id', $id)
              ->update(['qty' => $request->qty]);
        
        //send email if qty less equal 2
        if ($request->qty <= 2){
            $user_data = DB::table('users')
              ->where('level', 'staff')
              ->get();
        // $receivers = ['2111600827@student.budiluhur.ac.id','2111600454@student.budiluhur.ac.id','2111600470@student.budiluhur.ac.id','2111600447@student.budiluhur.ac.id'];
        $receivers = [];
        foreach ($user_data as $user){
            array_push($receivers,$user->email);
            $this->whatsappNotification($user->phone_no,$request->product_sku,$request->qty);
        }
        Mail::to($receivers)->send(new NotifMessageEmail($request->product_sku,$request->qty)); 
        }
        
        return 'berhasil';
    }
    private function whatsappNotification(string $recipient, string $sku, int $qty)
    {
        $sid    = getenv("TWILIO_AUTH_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= getenv("TWILIO_WHATSAPP_FROM");
        $twilio = new Client($sid, $token);
        
        $body = "[This is a stock condition notification]\n
        Unfortunately, the following products with the sku {{$sku}} will now be out of stock with qty {{$qty}}.\n
        Please do a restock for the product so that it can be purchased by the customer\n
        Thank you\n";

        return $twilio->messages
        ->create("whatsapp:$recipient",["from" => "whatsapp:$wa_from", "body" => $body]);
    }
}

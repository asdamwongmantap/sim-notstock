<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
   protected $table = 'products';
   protected $fillable = ['product_name','product_category','product_desc','product_weight',
   'product_sku','product_price','qty','min_qty','created_by','updated_by'];
}

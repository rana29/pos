<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoicedetils extends Model
{
     public function catagory(){
    	return $this->belongsTo(catagory::class,'cat_id','id');
    }


     public function product(){
    	return $this->belongsTo(product::class,'product_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    public function supplier(){
    	return $this->belongsTo(supplier::class,'supplier_id','id');
    }

    public function catagory(){
    	return $this->belongsTo(catagory::class,'cat_id','id');
    }

    public function unit(){
    	return $this->belongsTo(unit::class,'unit_id','id');
    }

     public function product(){
    	return $this->belongsTo(product::class,'product_id','id');
    }
}

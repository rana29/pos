<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=['name','cat_id','supplier_id','unit_id','quantity'];

    public function supplier(){
    	return $this->belongsTo(supplier::class,'supplier_id','id');
    }

    public function catagory(){
    	return $this->belongsTo(catagory::class,'cat_id','id');
    }

    public function unit(){
    	return $this->belongsTo(unit::class,'unit_id','id');
    }
}

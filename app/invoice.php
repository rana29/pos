<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
   
    public function payment(){
    return $this->belongsTo(payment::class,'id','invoice_id');//jheto invoice er vetor payment_id nai, but payment er vetor 
    }

    public function invoicedetils(){
    	return $this->hasMany(invoicedetils::class,'invoice_id','id');

    }


}

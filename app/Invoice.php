<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $dates = ['fecha'];
    protected $fillable = ['numero','fecha','client_id','notas','terminos','pie'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function details()
    {
        return $this->hasMany('App\Invoices_details');
    }

    public function sumTotal()
    {

        $mTotal = $this->details->sum('total');
        return number_format($mTotal ,2 ,'.',',') ;
    }

}

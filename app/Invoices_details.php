<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices_details extends Model
{
    //

	protected $fillable = ['producto','descripcion','cant','precio','impuesto','total','invoice_id'];

    public function inovice()
    {
        return $this->belongsTo('App\Inovice');
    }

}

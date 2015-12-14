<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = ['nombre','identificacion','direccion','telefono','movil','email','web'];

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

}

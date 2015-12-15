<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
	protected $fillable = ['nombre','identificacion','direccion','telefono','movil','email','web','logo'];
}

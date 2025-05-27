<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactbericht extends Model
{
    protected $table = 'contactberichten'; 

    protected $fillable = ['naam', 'email', 'bericht', 'gelezen'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $fillable = [
        'vl_movimentacao', 'id_conta'
    ];
    
    protected $table = 'movimentacao';
}

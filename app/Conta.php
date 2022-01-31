<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'id','vl_saldo', 'id_pessoa', 'conta_iniciada'
    ];
    
    protected $table = 'conta';
}

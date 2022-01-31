<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nm_pessoa',
        'cpf',
        'nm_endereco'
    ];
    
    protected $table = 'pessoa';
}

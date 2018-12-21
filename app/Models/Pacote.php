<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    protected $table = 'pacote';

    protected $fillable = [
        'nome',
        'valor',
        'dataInicio',
        'dataFim',
        'descricao',
        'urlImagem',
        'telefone',
        'site'
    ];

    protected $casts = [
        'dataInicio' => 'Timestamp',
        'dataFim' => 'Timestamp'
    ];

    public $timestamps = false;
}
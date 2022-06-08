<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotacaoFrete extends Model
{
    protected $table = 'cotacao_frete';
    protected $fillable = ['uf', 'percentual_cotacao', 'valor_extra', 'transpotadora_id'];
    public $timestamps = false;
}

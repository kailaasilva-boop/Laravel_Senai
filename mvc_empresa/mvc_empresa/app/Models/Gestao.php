<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Gestao extends Model
{
    protected $table = 'gestao';
    protected $fillables = [
        'nome',
        'tipo_materia_prima',
        'data_fabricacao',
        'quantidade',
        'preco_venda'
    ];
}
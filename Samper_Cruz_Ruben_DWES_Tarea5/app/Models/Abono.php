<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $table = "abonos";

    protected $primaryKey = 'id';
    
    //para que no añada columna updated_at, y la otra
    public $incrementing = false;
    protected $keyType = 'string';

    // public $timestamps = false; si dejo esto a false no se rellenan las columnas updated_at y created_at automaticamente

    protected $fillable = [
        'id',
        'abonado',
        'edad',
        'telefono',
        'cuenta_bancaria',
        'tipo',
        'asiento',
        'precio',
        'created_at',
        'updated_at'
    ];
}
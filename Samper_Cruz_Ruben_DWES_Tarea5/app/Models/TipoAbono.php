<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAbono extends Model
{
    protected $table = 'tipo_abonos';
    protected $primaryKey = 'id';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'descripcion',
        'precio',
    ];
}

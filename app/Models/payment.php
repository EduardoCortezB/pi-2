<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'table_payments';
    protected $fillable = [
        'id',
        'is_valid',
        'idPath', // pendiente por hacer nullable
        'id_candidat' // id de la preinscripcion
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'table_careers';
    protected $fillable = [
        'id',
        'career_name',
        'created_at'
    ];
}

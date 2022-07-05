<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_time extends Model
{
    use HasFactory;
    protected $table = 'table_class_times';
    protected $fillable = [
        'id',
        'start_time',
        'end_time',
        'start_date',
        'end_date',
        'daysPerWeek'
    ];
}

<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class period extends Model
{
    use HasFactory;
    protected $table='period';
    protected $fillable=[
        'id',
        'groupName',
        'start-date',
        'end-date',
        'isActive',
        'year',
        'id_level',
        'id_class_time'
    ];

    public function level(){
        return $this->belongsTo(Level::class,'id_level','id');
    }

    public function class_time(){
        return $this->belongsTo(Class_time::class,'id_class_time','id');
    }
}

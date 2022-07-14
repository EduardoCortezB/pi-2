<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_time extends Model
{
    use HasFactory;
    protected $table = 'table_class_times';
    protected $fillable = [
        'start_time',
        'end_time',
        'isActive',
        'daysPerWeek'
    ];
    protected $hidden = ['id'];

    public function period(){
        $this->hasMany(period::class);
    }
    public function candidate(){
        $this->hasMany(candidate::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    use HasFactory;
    protected $table = 'table_candidats';
    protected $fillable = [
        'id',
        'isCoursing',
        'user_id',
        'level_id',
        'class_time_id',
        'career_id',
        'language_id',
        'id_period'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function level(){
        return $this->belongsTo(Level::class,'level_id','id');
    }
    public function class_time(){
        return $this->belongsTo(Class_time::class,'class_time_id','id');
    }
    public function career(){
        return $this->belongsTo(Career::class,'career_id','id');
    }
    public function language(){
        return $this->belongsTo(Language::class,'language_id','id');
    }
    public function period(){
        return $this->belongsTo(period::class,'id_period','id');
    }
}

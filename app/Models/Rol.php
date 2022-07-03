<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'table_rols';
    protected $fillable = ['id','name_role'];

    public function users(){
        $this->hasMany(User::class);
    }
}

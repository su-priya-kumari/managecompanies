<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function employees()
    // {
    //     return $this->hasMany('App\Models\employee', 'company', 'id');
    //     // return $this->hasMany(employees::class);
    // }
    
}

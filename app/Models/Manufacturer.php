<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Manufacturer extends Model
{
    use HasFactory;
    protected  $table= 'manufacturers';
    protected $filltable = ['mf_name'];
    public function cars(){
        return $this->hasMany(Car::class, 'mf_id', 'id');
    }
  
}

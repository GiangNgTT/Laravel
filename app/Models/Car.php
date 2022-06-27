<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected  $table= 'cars';
    protected $filltable = [ 'image', 'description', 'model', 'mf_id', 'produced_on'];
    public function manufacturers(){
        return $this->belongsTo(Manufacturer::class, 'mf_id', 'id');
    }
}
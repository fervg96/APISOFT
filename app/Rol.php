<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table= 'rols';
    protected $primaryKey="id";
    public $timestamps=true;

    protected $fillable =[
        'descripcion'

    ];
}

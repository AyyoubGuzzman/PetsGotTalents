<?php

namespace App\Models;

use App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Juge extends Model
{
    use HasFactory;

    protected $fillable =[
        'firstName',
        'lastName',
        'email',
        'expertise'
    ];

    public function tests(){
        return $this->hasMany(Test::class, 'jugeID');
    }
}

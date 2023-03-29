<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'type',
        'age',
        'description',
        'ownerID'
    ];

    public function owner(){
        return $this->belongsTo(Owner::class,  'ownerID');
    }
    public function tests(){
        return $this->hasMany(Test::class);
    }
}

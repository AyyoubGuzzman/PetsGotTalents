<?php

namespace App\Models;

use App\Models\Juge;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected  $fillable = [
        'jugeID',
        'animalID',
        'score'
    ];

    public function juges(){
        return $this->belongsTo(Juge::class, 'jugeID');
    }
    public function animals(){
        return $this->belongsTo(Animal::class, 'animalID');
    }
}

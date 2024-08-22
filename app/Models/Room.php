<?php

namespace App\Models;
use App\Models\Sport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=['name','space','sports_id'];
    public function sport(){
        return $this->belongsTo(Sport::class,'sports_id');
    }
}

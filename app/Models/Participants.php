<?php

namespace App\Models;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    protected $fillable =['firstname','lastname','gender','phonenumber','email','address','date_of_birth'];
    public function sport(){
        return $this->belongsToMany(Sport::class,'participants_sports','participants_id','sports_id');

    }
}

<?php

namespace App\Models;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    use HasFactory;
    protected $fillable=['TFacilities'];
    public function Sport(){

        return $this->belongsToMany(Sport::class, 'facilitie_sports', 'facilities_id', 'sports_id');
    }



}

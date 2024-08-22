<?php

namespace App\Models;
use App\Models\Sport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catigory extends Model
{
    use HasFactory;
    protected $fillable=['sports_id','required-age','required-area'];
    public function sport(){
        return $this->belongsTo(Sport::class,'sports_id');
    }
    public function article(){
        return $this->belongsToMany(Article::class);
    }
}

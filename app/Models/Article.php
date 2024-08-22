<?php

namespace App\Models;
use App\Models\Sport;
use App\Models\Catigory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['sports_id','discription'];
    public function sport(){
        return $this->belongsTo(Sport::class,'sports_id');
    }

    public function catigory(){
        return $this->belongsToMany(Catigory::class);
    }

}

<?php

namespace App\Models;
use App\Models\Room;
use App\Models\Day;
use App\Models\Catigory;
use App\Models\Image;
use App\Models\Video;
use App\Models\Facilitie;
use App\Models\Participants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function room(){
        return $this->hasone(Room::class);
    }

    public function day(){
        return $this->hasMany(Day::class);
    }

    public function article(){
        return $this->hasMany(Article::class);
    }

    public function catigory(){
        return $this->hasMany(Catigory::class);
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
     public function video(){
        return $this->hasMany(Video::class);
    }
    public function facilities(){
        // return $this->belongsToMany(Facilitie::class);
        return $this->belongsToMany(Facilitie::class, 'facilitie_sports', 'sports_id', 'facilities_id');

    }

    public function participants(){
        return $this->belongsToMany(Participants::class,'participants_sports', 'sports_id', 'participants_id');
    }

}

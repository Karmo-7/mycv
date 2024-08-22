<?php

namespace App\Models;
use App\Models\Sport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=['sports_id','file','video_path'];

    public function sport(){
        return $this ->belongsTo(Sport::class,'sports_id');
    }
}

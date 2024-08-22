<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    protected $fillable=['sports_id','day_name'];
    public function sport(){
        return $this ->belongsTo(Sport::class,'sports_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=['participants_sports_id','discounts_id','amount'];
    public function participants_sports(){
        return $this->belongsTo(Participants_sport::class,'participants_sports_id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class,'discounts_id');
    }
}

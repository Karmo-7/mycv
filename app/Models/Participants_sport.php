<?php

namespace App\Models;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Participants_sport extends Model
{
    use HasFactory;
    protected $fillable=['sports_id','participants_id','subscriptionOne_price','status','reason'];
    public function discount(){
        return $this->belongsToMany(Discount::class,'payments');
    }

    public function participants(){
        return $this->belongsTo(Participants::class,'participants_id');
    }
    public function sport(){
        return $this->belongsTo(Sport::class,'sports_id');
    }


    // Method to calculate remaining days in the month

   public function getRemainingDaysAttribute()
{
    $subscriptionStartDate = $this->created_at; // Use 'created_at' to mark the subscription start date
    $currentDate = Carbon::now();
    $subscriptionPeriod = 30; // 30 days subscription period

    // Calculate remaining days and ensure it's an integer
    $remainingDays = max(0, $subscriptionPeriod - $currentDate->diffInDays($subscriptionStartDate));

    // Automatically update status if subscription has expired
    if ($remainingDays <= 0) {
        $this->update(['status' => 'not_active']);
    } else {
        $this->update(['status' => 'active']);
    }

    return $remainingDays;
}


}

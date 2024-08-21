<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['ditails', 'dateline', 'status', 'sold'];

    public function participants_sports(){
        return $this->belongsToMany(Participants_sport::class,'payments');
    }

    public function updateStatusIfExpired()
    {
        $expirationDate = Carbon::createFromTimestamp($this->dateline);

        if (Carbon::now()->greaterThanOrEqualTo($expirationDate) && $this->status == 'active') {
            $this->status = 'not_active';
            $this->save();
        }
    }
}

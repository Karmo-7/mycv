<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Participants_sport;
use Carbon\Carbon;

class UpdateParticipantsStatus extends Command
{
    protected $signature = 'participants:update-status';
    protected $description = 'Update participants status to not_active after 30 days of registration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all participants whose status is 'active' and were created more than 30 days ago
        $participants = Participants_sport::where('status', 'active')
            ->where('created_at', '<=', Carbon::now()->subDays(30))
            ->get();

        foreach ($participants as $participant) {
            $participant->update(['status' => 'not_active']);
            $this->info("Updated participant ID {$participant->id} to not_active");
        }

        $this->info('Participants status updated successfully.');
    }
}

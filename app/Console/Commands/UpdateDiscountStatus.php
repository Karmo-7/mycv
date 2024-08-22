<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Discount;

class UpdateDiscountStatus extends Command
{
    protected $signature = 'discounts:update-status';
    protected $description = 'Update discount status based on dateline';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $discounts = Discount::where('status', 'active')->get();

        foreach ($discounts as $discount) {
            $discount->updateStatusIfExpired();
        }

        $this->info('Discount status updated successfully.');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Activity;
use App\Models\Enums\ClientStatus;
use App\Notifications\ClientActionNotification;
use Illuminate\Console\Command;
use App\Models\Client;
use App\Repositories\Client\ClientRepository;
use Carbon\Carbon;

class CheckClientStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-client-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Client Status for Expiry';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expired_clients = Client::whereDate('expired_at', '<=', Carbon::today())->get();
        $date = Carbon::today();
        $this->info("Today: {$date}!");
        $this->info("Found Expired Clients count: {$expired_clients->count()}!");
        foreach ($expired_clients as $expired_client) {
            //update client status
            $expired_client->status = ClientStatus::EXPIRED;
            $expired_client->save();
        }
    }
}

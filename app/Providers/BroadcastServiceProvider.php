<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::channel('channel-name', function ($user, $orderId) {
            return true;
        });
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}

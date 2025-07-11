<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $notifications = Notification::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

                $unreadCount = Notification::where('user_id', auth()->id())
                    ->where('is_read', false)
                    ->count();

                $view->with([
                    'userNotifications' => $notifications,
                    'unreadNotifications' => $unreadCount,
                ]);
            }
        });
    }
}

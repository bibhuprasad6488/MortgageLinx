<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        $setting = \App\Models\SiteSetting::first();

        if ($setting) {
            config([
                // 'mail.mailers.smtp.host' => $setting->smtp_host,
                // 'mail.mailers.smtp.port' => $setting->smtp_port,
                // 'mail.mailers.smtp.username' => $setting->smtp_username,
                'mail.mailers.smtp.password' => $setting->smtp_password,
                // 'mail.from.address' => $setting->smtp_from_email,
                // 'mail.from.name' => $setting->smtp_from_name,
            ]);
        }
    }
}

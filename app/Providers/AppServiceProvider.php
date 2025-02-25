<?php

namespace App\Providers;

use App\Models\FooterAndHeader;
use App\Models\HeaderAndFooter;
use App\Models\Navigation;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\Facades\View;
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
        FilamentColor::register([
            'primary' => Color::hex('#c93f6a'),
        ]);

        View::composer(['components.layouts.app'], function ($view) {
            $view->with([
                'siteInfo' => HeaderAndFooter::first(),
            ]);
        });
    }
}

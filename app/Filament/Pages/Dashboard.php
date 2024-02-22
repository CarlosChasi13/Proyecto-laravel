<?php

namespace App\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentIcon;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;


class Dashboard extends Page
{
    protected static ?int $navigationSort = -2;

    protected static ?string $title = "Dashboard";

    protected static string $routePath = '/';

    protected static string $view = 'filament.pages.dashboard';

    public static function getNavigationLabel(): string
    {
        return static::$title;
    }

    public static function getNavigationIcon(): ?string
    {
        return static::$navigationIcon
            ?? FilamentIcon::resolve('panels::pages.dashboard.navigation-item')
            ?? (Filament::hasTopNavigation() ? 'heroicon-m-home' : 'heroicon-o-home');
    }

    public static function getRoutePath(): string
    {
        return static::$routePath;
    }

    public function getTitle(): string | Htmlable
    {
        return static::$title ?? __('filament-panels::pages/dashboard.title');
    }
}

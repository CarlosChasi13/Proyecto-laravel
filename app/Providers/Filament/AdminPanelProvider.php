<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\Pages\Dashboard;
use App\Filament\Resources;
use Filament\PanelProvider;
use App\Filament\Widgets;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use App\Filament\Resources\DocenteResource;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->profile()
            ->login()
            ->brandName('GDOC')
            ->favicon(asset('img/logo.png'))
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                Widgets\DocentePorAreaChart::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Página Principal')
                                ->icon('heroicon-o-home')
                                ->url(fn (): string => '/', shouldOpenInNewTab: true),
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-presentation-chart-line')
                                ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn (): string => Dashboard::getUrl()),
                        ]),
                        NavigationGroup::make('Académico')
                        ->items([
                            NavigationItem::make('Docente')
                            ->icon('heroicon-o-user-group')
                            ->url(fn ():string => DocenteResource::getUrl())
                            ->visible(fn(): bool => auth()->user()->can('view Docente')),
                        ]),
                        NavigationGroup::make('Configuración')
                        ->items([

                        ]),
                        NavigationGroup::make('Administración')
                        ->items([
                            NavigationItem::make('Usuario')
                                ->icon('heroicon-o-user-group')
                                ->url(fn ():string => Resources\UserResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view User')),
                            NavigationItem::make('Roles')
                                ->icon('heroicon-o-user-group')
                                ->url(fn (): string => RoleResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Role')),
                            NavigationItem::make('Permisos')
                                ->icon('heroicon-o-shield-check')
                                ->url(fn (): string => PermissionResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Permission')),
                        ]),
                        NavigationGroup::make('Cuenta')
                        ->items([
                            NavigationItem::make('Perfil')
                                ->icon('heroicon-o-identification')
                                ->url(fn (): string => MyProfilePage::getUrl()),
                        ])
                        ->collapsed(false),
                ]);
            })
            ->authGuard('web')
            ->plugins([
                BreezyCore::make()
                ->myProfile(
                    slug: 'perfil'
                )
                ->enableTwoFactorAuthentication(
                    force: false,
                ),
                FilamentSpatieRolesPermissionsPlugin::make()
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

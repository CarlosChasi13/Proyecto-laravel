<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\Widgets;
use App\Filament\Pages\Dashboard;
use App\Filament\Resources;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Resources\UserResource;
use Filament\Resources\NavigationLink;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\NavigationBuilder;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Resources\Resource;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('GDOC')
            ->favicon(asset('img/logo.png'))
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->font('Poppins')
            ->brandName('Gestión DCCO')
           
            ->navigationGroups([
                'Reportes',
            ])
            ->navigationItems([
                // Rerporte de Balance General
                NavigationItem::make('Lista de Profesores')
                    ->group('Reportes')
                    ->URL('/generate-docentes-pdf')
                    ->openUrlInNewTab()
                    ->sort(2),
            ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
            ])
            
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn (): string => Dashboard::getUrl()),
                        ]),
                        NavigationGroup::make('Académico')
                        ->items([
                            ...Resources\UserResource::getNavigationItems(),
                        ]),
                        NavigationGroup::make('Configuración')
                        ->items([
                            ...Resources\UserResource::getNavigationItems(),
                        ]),
                        NavigationGroup::make('Administración')
                        ->items([
                                ...Resources\UserResource::getNavigationItems(),
                        ]),
                        
                        NavigationGroup::make('Reportes')
                        ->items([
                            NavigationItem::make('Generar PDF de Docentes')
                            ->url(route('generateDocentesPDF')),
                            NavigationItem::make('Generar PDF de Nrcs')
                            ->url(route('generateNrcsPDF')),
                            NavigationItem::make('Generar PDF de Materias')
                            ->url(route('generateMateriasPDF')),
                            NavigationItem::make('Generar PDF de Docentes por Área')
                            ->url(route('generateAreasPDF')),
                            NavigationItem::make('Generar PDF de Datos de Docentes')
                            ->url(route('generateDatosPDF')),
                        ]),
                ]);
            })
            
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

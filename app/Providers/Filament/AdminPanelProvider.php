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

                /* TODO Corregir relacion en modelo */
                /* Widgets\AsignaturaAreaChart::class, */

                Widgets\DocenteDepartamentoChart::class,

                /* TODO Corregir relacion en modelo */
                /* Widgets\NrcAreaChart::class, */
                
                Widgets\NrcMateriaChart::class,

                /* TODO Corregir relacion en modelo */
                /* Widgets\DocenteMateriaChart::class, */
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
                        NavigationGroup::make('Docencia')
                        ->items([
                            NavigationItem::make('Docentes')
                                ->icon('heroicon-o-users')
                                ->url(fn ():string => Resources\DocenteResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Docente')),
                            NavigationItem::make('Títulos')
                                ->icon('heroicon-o-trophy')
                                ->url(fn ():string => Resources\TituloResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Titulo')),
                            NavigationItem::make('Experiencias Laborales')
                                ->icon('heroicon-o-briefcase')
                                ->url(fn ():string => Resources\ExperiencialaboralResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Experiencialaboral')),
                            NavigationItem::make('Capacitaciones')
                                ->icon('heroicon-o-light-bulb')
                                ->url(fn ():string => Resources\CapacitacionResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Capacitacion')),
                            NavigationItem::make('Publicaciones Científicas')
                                ->icon('heroicon-o-newspaper')
                                ->url(fn ():string => Resources\PublicacioncientificaResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Publicacioncientifica')),
                            NavigationItem::make('Áreas de Conocimiento')
                                ->icon('heroicon-o-swatch')
                                ->url(fn ():string => Resources\DocenteareaconocimientoResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Docenteareaconocimiento')),
                            NavigationItem::make('Áreas de Interés')
                                ->icon('heroicon-o-star')
                                ->url(fn ():string => Resources\AreainteresResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Areainteres')),
                        ]),
                        NavigationGroup::make('Académico')
                        ->items([
                            NavigationItem::make('Materias')
                                ->icon('heroicon-o-inbox')
                                ->url(fn ():string => Resources\MateriaResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Materia')),
                            NavigationItem::make('NRCs')
                                ->icon('heroicon-o-inbox-stack')
                                ->url(fn ():string => Resources\NrcResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Nrc')),
                        ]),
                        NavigationGroup::make('Configuración Académica')
                            ->items([
                                NavigationItem::make('Áreas de Conocimiento')
                                    ->icon('heroicon-o-academic-cap')
                                    ->url(fn (): string => Resources\AreaconocimientoResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Areaconocimiento')),
                                NavigationItem::make('Categorizacion de Áreas de Conocimiento')
                                    ->icon('heroicon-o-puzzle-piece')
                                    ->url(fn (): string => Resources\CodigoareaconocimientoResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Codigoareaconocimiento')),
                                NavigationItem::make('Niveles Académicos')
                                    ->icon('heroicon-o-square-3-stack-3d')
                                    ->url(fn (): string => Resources\GradoResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Grado')),
                                NavigationItem::make('Siglas de Semestre')
                                    ->icon('heroicon-o-identification')
                                    ->url(fn (): string => Resources\SiglaResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Sigla')),
                                NavigationItem::make('Periodos Académicos')
                                    ->icon('heroicon-o-folder-open')
                                    ->url(fn (): string => Resources\PeriodoacademicoResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Periodoacademico')),
                                NavigationItem::make('Sedes')
                                    ->icon('heroicon-o-home-modern')
                                    ->url(fn (): string => Resources\SedeResource::getUrl())
                                    ->visible(fn (): bool => auth()->user()->can('view Sede')),
                        ])
                        ->collapsed(),
                        NavigationGroup::make('Configuración General')
                        ->items([
                            NavigationItem::make('Género')
                                ->icon('heroicon-o-tag')
                                ->url(fn ():string => Resources\GeneroResource::getUrl())
                                ->visible(fn (): bool => auth()->user()->can('view Genero')),
                            NavigationItem::make('Provincia')
                                ->icon('heroicon-o-map')
                                ->url(fn ():string => Resources\ProvinciaResource::getUrl())
                                ->visible(fn (): bool => auth()->user()->can('view Provincia')),
                            NavigationItem::make('Pais')
                                ->icon('heroicon-o-globe-americas')
                                ->url(fn ():string => Resources\PaisResource::getUrl())
                                ->visible(fn (): bool => auth()->user()->can('view Pais')),
                        ])
                        ->collapsed(),
                        NavigationGroup::make('Administración')
                        ->items([
                            NavigationItem::make('Usuarios')
                                ->icon('heroicon-o-user-group')
                                ->url(fn ():string => Resources\UserResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view User')),
                            NavigationItem::make('Roles')
                                ->icon('heroicon-o-identification')
                                ->url(fn (): string => RoleResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Role')),
                            NavigationItem::make('Permisos')
                                ->icon('heroicon-o-shield-check')
                                ->url(fn (): string => PermissionResource::getUrl())
                                ->visible(fn(): bool => auth()->user()->can('view Permission')),
                            ])
                            ->collapsible(false),
                        NavigationGroup::make('Cuenta')
                        ->items([
                            NavigationItem::make('Perfil')
                                ->icon('heroicon-o-user')
                                ->url(fn (): string => MyProfilePage::getUrl()),
                        ])
                        ->collapsible(false),
                ]);
            })
            ->sidebarCollapsibleOnDesktop()
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

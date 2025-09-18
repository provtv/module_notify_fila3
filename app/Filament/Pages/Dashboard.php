<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Filament\Pages\XotBaseDashboard;

class Dashboard extends XotBaseDashboard
=======
use Filament\Pages\Page;

class Dashboard extends Page
>>>>>>> 90c60faa (.)
=======
use Filament\Pages\Page;

class Dashboard extends Page
>>>>>>> 9b05d0a6 (.)
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'notify::filament.pages.dashboard';

    public function mount(): void
    {
        /*
        $user = auth()->user();
        if (! $user->hasRole('super-admin')) {
            redirect('/admin');
        }
        */
    }
}

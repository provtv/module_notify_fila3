<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'notify::filament.pages.dashboard';

    public function mount(): void
    {
        /*
        $user = auth()->user();
<<<<<<< HEAD
<<<<<<< HEAD
        if (! $user->hasRole('super-admin')) {
=======
<<<<<<< HEAD
        if (! $user->hasRole('super-admin')) {
=======
        if (! $user?->hasRole('super-admin')) {
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
=======
        if (! $user?->hasRole('super-admin')) {
>>>>>>> ba48b8c (.)
            redirect('/admin');
        }
        */
    }
}

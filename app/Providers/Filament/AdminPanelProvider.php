<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Notify\Providers\Filament;

use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
<<<<<<< HEAD
use Filament\SpatieLaravelTranslatablePlugin;
=======
>>>>>>> 90c60faa (.)

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Notify';

    public function panel(Panel $panel): Panel
<<<<<<< HEAD
    { 
        $panel->plugins([
            SpatieLaravelTranslatablePlugin::make(),
        ]);
=======
    {
>>>>>>> 90c60faa (.)
        if (! XotData::make()->disable_database_notifications) {
            DatabaseNotifications::trigger('notify::livewire.database-notifications-trigger');
            // DatabaseNotifications::databaseNotificationsPollingInterval('30s');
            DatabaseNotifications::pollingInterval('60s');
            FilamentView::registerRenderHook(
                'panels::user-menu.before',
                static fn (): string => Blade::render('@livewire(\'database-notifications\')'),
            );
        }

<<<<<<< HEAD
       

        return parent::panel($panel);
    }
}

=======
        return parent::panel($panel);
    }
}
>>>>>>> 90c60faa (.)

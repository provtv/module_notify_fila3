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
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\SpatieLaravelTranslatablePlugin;
=======
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Notify';

    public function panel(Panel $panel): Panel
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    { 
        $panel->plugins([
            SpatieLaravelTranslatablePlugin::make(),
        ]);
=======
    {
>>>>>>> 90c60faa (.)
=======
    {
>>>>>>> 9b05d0a6 (.)
=======
    {
>>>>>>> 4bf9ea78 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
       

        return parent::panel($panel);
    }
}

=======
        return parent::panel($panel);
    }
}
>>>>>>> 90c60faa (.)
=======
        return parent::panel($panel);
    }
}
>>>>>>> 9b05d0a6 (.)
=======
        return parent::panel($panel);
    }
}
>>>>>>> 4bf9ea78 (.)

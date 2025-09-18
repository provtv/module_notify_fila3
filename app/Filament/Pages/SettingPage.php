<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Pages\XotBasePage;
use Modules\Xot\Filament\Widgets\EnvWidget;

class SettingPage extends XotBasePage
=======
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
use Filament\Pages\Page;
use Modules\Xot\Filament\Widgets\EnvWidget;

class SettingPage extends Page
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'notify::filament.pages.setting';

    public function getHeaderWidgets(): array
    {
        $only = [
            'debugbar_enabled',
            // 'google_maps_api_key',
            'telegram_bot_token',
        ];

        return [
            EnvWidget::make(['only' => $only]),
        ];
    }
}

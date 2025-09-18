<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\ContactResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Notify\Filament\Resources\ContactResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

class EditContact extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<string, \Filament\Actions\Action> */
=======
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
        return [
            DeleteAction::make(),
        ];
    }
}

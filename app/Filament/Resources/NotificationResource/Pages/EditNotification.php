<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Actions\DeleteAction;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
>>>>>>> 90c60faa (.)
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
>>>>>>> 9b05d0a6 (.)
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
>>>>>>> 4bf9ea78 (.)

class EditNotification extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = NotificationResource::class;

}

<?php

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);



=======
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Textarea;
use Modules\Notify\Filament\Resources\NotificationResource\Pages;
use Modules\Notify\Models\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
use Modules\Notify\Filament\Resources\NotificationResource\Pages;
use Modules\Notify\Models\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)

class NotificationResource extends XotBaseResource
{
    protected static ?string $model = Notification::class;


    public static function getFormSchema(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var array<string, \Filament\Forms\Components\Component> */
        /** @var array<string, \Filament\Forms\Components\Component> */
=======
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
        return [
            'type' => TextInput::make('type')
                ->required()
                ->label('Notification Type'),

            'notifiable_type' => TextInput::make('notifiable_type')
                ->required()
                ->label('Notifiable Type'),

            'notifiable_id' => TextInput::make('notifiable_id')
                ->required()
                ->numeric()
                ->label('Notifiable ID'),
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'data' => Textarea::make('data')
                ->label('Notification Data')
=======
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
            'data' => KeyValue::make('data')
                ->label('Notification Data')
                ->keyLabel('Key')
                ->valueLabel('Value')
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
                ->columnSpanFull(),

            'read_at' => DateTimePicker::make('read_at')
                ->label('Read At')
                ->nullable(),

            'created_by' => TextInput::make('created_by')
                ->label('Created By')
                ->disabled(),

            'updated_by' => TextInput::make('updated_by')
                ->label('Updated By')
                ->disabled(),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
   
>>>>>>> 90c60faa (.)
=======
   
>>>>>>> 9b05d0a6 (.)
=======
   
>>>>>>> 4bf9ea78 (.)
}

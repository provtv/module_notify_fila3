<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotifyThemeResource\Pages;

use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;




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





class ListNotifyThemes extends XotBaseListRecords
{
    protected static string $resource = NotifyThemeResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableColumns(): array
    {
        /** @var array<string, \Filament\Tables\Columns\Column> */
        /** @var array<string, \Filament\Tables\Columns\Column> */
=======
    public function getListTableColumns(): array
    {
>>>>>>> 90c60faa (.)
=======
    public function getListTableColumns(): array
    {
>>>>>>> 9b05d0a6 (.)
=======
    public function getListTableColumns(): array
    {
>>>>>>> 4bf9ea78 (.)
        return [
            'id' => Columns\TextColumn::make('id')
                ->sortable(),
            'lang' => Columns\TextColumn::make('lang')
                ->sortable(),
            'type' => Columns\TextColumn::make('type')
                ->sortable(),
            'post_id' => Columns\TextColumn::make('post_id')
                ->sortable(),
            'post_type' => Columns\TextColumn::make('post_type')
                ->sortable(),
            'logo_src' => Columns\TextColumn::make('logo_src')
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'lang' => Filters\SelectFilter::make('lang')
                ->options(function (): array {
                    return NotifyThemeResource::fieldOptions('lang');
                }),
            'post_type' => Filters\SelectFilter::make('post_type')
                ->options(function (): array {
                    return NotifyThemeResource::fieldOptions('post_type');
                }),
            'type' => Filters\SelectFilter::make('type')
                ->options(function (): array {
                    return NotifyThemeResource::fieldOptions('type');
                })
        ];
    }

}

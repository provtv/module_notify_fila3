<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\ContactResource\Pages;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Notify\Filament\Resources\ContactResource;
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


class ListContacts extends XotBaseListRecords
{
    protected static string $resource = ContactResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTableColumns(): array
    {
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
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable(),
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable(),
            'phone' => TextColumn::make('phone')
                ->searchable()
                ->sortable(),
            'message' => TextColumn::make('message')
                ->searchable()
                ->sortable(),
            'is_read' => IconColumn::make('is_read')
                ->boolean(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'active' => Filter::make('active')
                ->query(function (Builder $query): Builder {
                    return $query->where('active', true);
                }),
            'inactive' => Filter::make('inactive')
                ->query(function (Builder $query): Builder {
                    return $query->where('active', false);
                }),
        ];
    }
}

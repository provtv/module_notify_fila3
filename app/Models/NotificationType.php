<?php

declare(strict_types=1);
namespace Modules\Notify\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationType query()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @mixin IdeHelperNotificationType
=======
>>>>>>> 90c60faa (.)
=======
>>>>>>> 9b05d0a6 (.)
=======
>>>>>>> 4bf9ea78 (.)
 * @mixin \Eloquent
 */
class NotificationType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'template',
    ];
}

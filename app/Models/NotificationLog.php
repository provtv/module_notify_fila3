<?php

declare(strict_types=1);

namespace Modules\Notify\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Notify\Enums\NotificationLogStatusEnum;

/**
 * Modello per il logging delle notifiche.
 * 
 * @property int $id
 * @property int|null $template_id
 * @property string $recipient_type
 * @property int $recipient_id
 * @property string $content
 * @property array $data
 * @property array $channels
 * @property NotificationLogStatusEnum $status
 * @property \Carbon\Carbon|null $sent_at
 * @property \Carbon\Carbon|null $delivered_at
 * @property \Carbon\Carbon|null $opened_at
 * @property \Carbon\Carbon|null $clicked_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read NotificationTemplate|null $template
 */
final class NotificationLog extends BaseModel
{
    protected $fillable = [
        'template_id',
        'recipient_id',
        'recipient_type',
        'content',
        'data',
        'channels',
        'status',
        'sent_at',
        'delivered_at',
        'opened_at',
        'clicked_at',
    ];

    protected $casts = [
        'data' => 'array',
        'channels' => 'array',
        'sent_at' => 'datetime',
        'delivered_at' => 'datetime',
        'opened_at' => 'datetime',
        'clicked_at' => 'datetime',
        'status' => NotificationLogStatusEnum::class,
    ];

    /**
     * Ottiene il template associato a questo log.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(NotificationTemplate::class);
    }

    /**
     * Ottiene il notifiable associato a questo log.
     */
    public function notifiable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope per filtrare i log per notifiable.
     */
    public function scopeForNotifiable(
        \Illuminate\Database\Eloquent\Builder $query, 
        \Illuminate\Database\Eloquent\Model $notifiable
    ): \Illuminate\Database\Eloquent\Builder {
        return $query
            ->where('recipient_type', $notifiable->getMorphClass())
            ->where('recipient_id', $notifiable->getKey());
    }

    /**
     * Scope per filtrare i log per stato.
     */
    public function scopeWithStatus(
        \Illuminate\Database\Eloquent\Builder $query, 
        NotificationLogStatusEnum $status
    ): \Illuminate\Database\Eloquent\Builder {
        return $query->where('status', $status);
    }

    /**
     * Scope per filtrare i log per template.
     */
    public function scopeForTemplate(
        \Illuminate\Database\Eloquent\Builder $query, 
        int $templateId
    ): \Illuminate\Database\Eloquent\Builder {
        return $query->where('template_id', $templateId);
    }
}
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Modello per il logging delle notifiche inviate.
 */
class NotificationLog extends Model
{
    use HasFactory;
    
    /**
     * Tabella associata al modello.
     *
     * @var string
     */
    protected $table = 'notification_logs';
    
    /**
     * Gli attributi che sono assegnabili in massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'notifiable_type',
        'notifiable_id',
        'title',
        'content',
        'channels',
        'data',
        'sent_at',
        'status',
        'error',
    ];
    
    /**
     * Gli attributi da castare.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'channels' => 'array',
        'data' => 'array',
        'sent_at' => 'datetime',
    ];
    
    /**
     * Ottiene l'entità notificabile.
     *
     * @return MorphTo
     */
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }
    
    /**
     * Scope per filtrare per stato.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithStatus($query, string $status)
    {
        return $query->where('status', $status);
    }
    
    /**
     * Scope per filtrare per canale.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $channel
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithChannel($query, string $channel)
    {
        return $query->whereJsonContains('channels', $channel);
    }
    
    /**
     * Scope per filtrare per tipo di notificabile.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForNotifiableType($query, string $type)
    {
        return $query->where('notifiable_type', $type);
    }
}
>>>>>>> 90c60faa (.)

<<<<<<< HEAD
# Queueable Actions del Modulo Notify

## SendNotificationAction

### Responsabilità
- Invio notifiche
- Gestione code
- Tracking eventi

### Implementazione
```php
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\NotificationLog;

final class SendNotificationAction extends QueueableAction
{
    public function execute(
        Model $recipient,
        string $templateCode,
        array $data = [],
        array $channels = [],
        array $options = []
    ): NotificationLog {
        $template = Template::where('code', $templateCode)->firstOrFail();
        $content = $this->compileTemplate($template, $data);

        $notification = new NotificationLog([
            'template_id' => $template->id,
            'recipient_id' => $recipient->id,
            'recipient_type' => get_class($recipient),
            'content' => $content,
            'data' => $data,
            'channels' => $channels,
            'status' => 'pending'
        ]);

        $notification->save();

        foreach ($channels as $channel) {
            $this->dispatchToChannel($channel, $notification);
        }

        return $notification;
    }

    private function compileTemplate(Template $template, array $data): string
    {
        $version = $template->latestVersion();
        if (!$version) {
            throw new RuntimeException('Template non ha versioni');
        }

        return $this->replaceVariables($version->content, $data);
    }

    private function replaceVariables(string $content, array $data): string
    {
        return preg_replace_callback(
            '/\{\{\s*([^}]+)\s*\}\}/',
            fn($matches) => $data[$matches[1]] ?? '',
            $content
        );
    }

    private function dispatchToChannel(string $channel, NotificationLog $notification): void
    {
        match($channel) {
            'mail' => $this->dispatchToMail($notification),
            'sms' => $this->dispatchToSms($notification),
            'database' => $this->dispatchToDatabase($notification),
            default => throw new InvalidArgumentException("Canale non supportato: {$channel}")
        };
    }
}
```

## TrackNotificationEventAction

### Responsabilità
- Tracking eventi notifica
- Aggiornamento analytics
- Logging attività

### Implementazione
```php
use Spatie\QueueableAction\QueueableAction;
use Modules\Notify\Models\NotificationLog;
use Modules\Notify\Models\TemplateAnalytics;

final class TrackNotificationEventAction extends QueueableAction
{
    public function execute(
        NotificationLog $notification,
        string $eventType,
        array $eventData = []
    ): void {
        $analytics = new TemplateAnalytics([
            'template_id' => $notification->template_id,
            'notification_id' => $notification->id,
            'event_type' => $eventType,
            'event_data' => $eventData,
            'occurred_at' => now()
        ]);

        $analytics->save();

        event(new AnalyticsEventRecorded($analytics));
    }
}
```

## CompileTemplateAction

### Responsabilità
- Compilazione template
- Validazione contenuti
- Gestione versioni

### Implementazione
```php
use Spatie\QueueableAction\QueueableAction;
use Modules\Notify\Models\Template;

final class CompileTemplateAction extends QueueableAction
{
    public function execute(
        Template $template,
        array $data = []
    ): string {
        $version = $template->latestVersion();
        if (!$version) {
            throw new RuntimeException('Template non ha versioni');
        }

        $content = $this->replaceVariables($version->content, $data);

        if ($template->type === 'email') {
            $content = $this->compileMjml($content);
        }

        return $content;
    }

    private function replaceVariables(string $content, array $data): string
    {
        return preg_replace_callback(
            '/\{\{\s*([^}]+)\s*\}\}/',
            fn($matches) => $data[$matches[1]] ?? '',
            $content
        );
    }

    private function compileMjml(string $mjml): string
    {
        // Implementazione compilazione MJML
        return $mjml;
    }
}
```

## Configurazione Actions

### Service Provider
```php
final class NotifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SendNotificationAction::class);
        $this->app->bind(TrackNotificationEventAction::class);
        $this->app->bind(CompileTemplateAction::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'notify');
    }
}
```

## Gestione Eventi

### Event Listeners
```php
final class NotificationEventSubscriber implements EventSubscriber
{
    public function handleNotificationSent(NotificationSent $event): void
    {
        app(TrackNotificationEventAction::class)->execute(
            $event->notification,
            'sent',
            ['recipient' => $event->recipient]
        );
    }

    public function handleNotificationDelivered(NotificationDelivered $event): void
    {
        app(TrackNotificationEventAction::class)->execute(
            $event->notification,
            'delivered',
            ['recipient' => $event->recipient]
        );
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            NotificationSent::class => 'handleNotificationSent',
            NotificationDelivered::class => 'handleNotificationDelivered',
        ];
    }
}
``` 
=======
# Servizi del Modulo Xot

## LangService

Il servizio di gestione delle traduzioni fornisce un sistema centralizzato per la gestione delle traduzioni dell'applicazione.

### Caratteristiche Principali

```php
use Modules\Xot\Services\LangService;

// Caricamento automatico delle traduzioni
LangService::loadTranslations('broker');

// Recupero traduzione con fallback
$translation = LangService::get('broker.polizze.status.active', 'Attiva');

// Cache delle traduzioni
LangService::cache()->get('broker.polizze.labels');

// Supporto multi-lingua
LangService::setLocale('it');
$translation = LangService::get('broker.polizze.status.active');
```

### Struttura File Traduzioni

```php
// Modules/Broker/Resources/lang/it/polizze.php
return [
    'status' => [
        'active' => 'Attiva',
        'suspended' => 'Sospesa',
        'cancelled' => 'Annullata',
    ],
    'labels' => [
        'policy_number' => 'Numero Polizza',
        'customer' => 'Cliente',
    ],
];
```

## PermissionService

Gestisce i permessi e i ruoli dell'applicazione.

### Caratteristiche Principali

```php
use Modules\Xot\Services\PermissionService;

// Verifica permessi
PermissionService::can('polizze.view');

// Assegnazione ruoli
PermissionService::assignRole($user, 'admin');

// Cache dei permessi
PermissionService::cache()->get('user.1.permissions');

// Sincronizzazione permessi
PermissionService::sync();
```

### Struttura Permessi

```php
// config/permissions.php
return [
    'roles' => [
        'admin' => [
            'label' => 'Amministratore',
            'permissions' => ['*'],
        ],
        'broker' => [
            'label' => 'Broker',
            'permissions' => [
                'polizze.*',
                'clienti.view',
                'clienti.create',
            ],
        ],
    ],
    'permissions' => [
        'polizze.view' => 'Visualizza polizze',
        'polizze.create' => 'Crea polizze',
        'polizze.edit' => 'Modifica polizze',
        'polizze.delete' => 'Elimina polizze',
    ],
];
```

## ConfigService

Gestisce le configurazioni dell'applicazione.

### Caratteristiche Principali

```php
use Modules\Xot\Services\ConfigService;

// Recupero configurazioni
$config = ConfigService::get('broker.settings');

// Cache configurazioni
ConfigService::cache()->get('broker.settings');

// Aggiornamento configurazioni
ConfigService::set('broker.settings.default_currency', 'EUR');

// Merge configurazioni
ConfigService::merge('broker.settings', [
    'notification_email' => 'admin@example.com',
]);
```

### Struttura Configurazioni

```php
// Modules/Broker/Config/config.php
return [
    'settings' => [
        'default_currency' => 'EUR',
        'vat_rate' => 22,
        'notification_email' => 'admin@example.com',
    ],
];
```

## FileService

Gestisce il caricamento e la manipolazione dei file.

### Caratteristiche Principali

```php
use Modules\Xot\Services\FileService;

// Upload file
$path = FileService::upload($file, 'documenti');

// Generazione URL
$url = FileService::url($path);

// Eliminazione file
FileService::delete($path);

// Manipolazione immagini
FileService::image($path)
    ->resize(800, 600)
    ->save();
```

### Configurazione Storage

```php
// config/filesystems.php
return [
    'disks' => [
        'documenti' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],
    ],
];
```

## NotificationService

Gestisce l'invio di notifiche attraverso vari canali.

### Caratteristiche Principali

```php
use Modules\Xot\Services\NotificationService;

// Invio notifica
NotificationService::send($user, new PolizzaScadenzaNotification($polizza));

// Notifica immediata
NotificationService::sendNow($user, new UrgentNotification());

// Notifica programmata
NotificationService::sendLater($user, new ReminderNotification(), now()->addDays(7));

// Verifica stato notifica
NotificationService::check($notificationId);
```

### Configurazione Notifiche

```php
// config/notifications.php
return [
    'channels' => [
        'mail' => [
            'from' => [
                'address' => 'noreply@example.com',
                'name' => 'OrisBroker',
            ],
        ],
        'database' => true,
        'slack' => [
            'webhook_url' => env('SLACK_WEBHOOK_URL'),
        ],
    ],
];
```

## Best Practices

1. **Dependency Injection**
   - Utilizzare l'iniezione delle dipendenze
   - Evitare l'uso diretto delle facciate
   - Preferire l'interfaccia ai dettagli implementativi

2. **Caching**
   - Implementare strategie di cache
   - Utilizzare chiavi di cache significative
   - Gestire l'invalidazione della cache

3. **Error Handling**
   - Utilizzare eccezioni personalizzate
   - Loggare errori significativi
   - Fornire messaggi di errore chiari

4. **Testing**
   - Scrivere test unitari per ogni servizio
   - Utilizzare mock per le dipendenze
   - Testare i casi limite 
>>>>>>> 688d0704 (first)

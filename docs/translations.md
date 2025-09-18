# Traduzioni del Modulo Notify

## Collegamenti

- [Modulo Lang](../../Lang/docs/module_lang.md) - Documentazione principale sulle traduzioni
- [Regole Generali Traduzioni](../../Xot/docs/translations.md)

## Struttura

```
Modules/Notify/
└── lang/
    ├── it/
    │   └── notify.php
    └── en/
        └── notify.php
```

## Contenuto

Il file `notify.php` contiene le traduzioni per:
- Notifiche sistema
- Email
- SMS
- Push notification
- Template messaggi
- Configurazione notifiche
- Preferenze utente
- Log notifiche
- Stati notifiche
- Canali di notifica

## Esempi

```php
return [
    'email' => [
        'label' => 'Email',
        'tooltip' => 'Gestisci le notifiche email'
    ],
    'sms' => [
        'label' => 'SMS',
        'tooltip' => 'Gestisci le notifiche SMS'
    ],
    'push' => [
        'label' => 'Push',
        'tooltip' => 'Gestisci le notifiche push'
    ],
    'templates' => [
        'label' => 'Template',
        'tooltip' => 'Gestisci i template dei messaggi'
    ]
];
``` 
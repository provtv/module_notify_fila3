# Traits del modulo Xot

Il modulo Xot fornisce una serie di trait utili per estendere le funzionalità dei modelli e altre classi in tutto il sistema.

## HasExtraTrait

### Panoramica
`HasExtraTrait` è un trait che aggiunge la funzionalità di attributi extra flessibili a un modello attraverso una relazione morph. Questo trait permette di salvare e recuperare dati schemaless (non vincolati a un schema fisso) associati a qualsiasi modello.

### Implementazione
Il trait utilizza il pacchetto `spatie/laravel-schemaless-attributes` per gestire attributi JSON senza schema fisso e implementa una relazione morph con il modello `Extra`.

### Metodi principali

#### `extra(): MorphOne`
Definisce la relazione morph-one con il modello Extra.

```php
public function extra(): MorphOne
{
    return $this->morphOne(Extra::class, 'model');
}
```

#### `getExtraAttribute(string $key, $default = null)`
Recupera un attributo extra specifico dal modello.

```php
// Esempio di utilizzo
$userPreference = $user->getExtraAttribute('theme_preference', 'light');
```

#### `setExtraAttribute(string $key, $value): self`
Imposta un attributo extra sul modello.

```php
// Esempio di utilizzo
$user->setExtraAttribute('theme_preference', 'dark');
```

#### `hasExtraAttribute(string $key): bool`
Verifica se esiste un attributo extra specifico.

```php
// Esempio di utilizzo
if ($user->hasExtraAttribute('accepted_terms')) {
    // Logica per utenti che hanno accettato i termini
}
```

#### `removeExtraAttribute(string $key): self`
Rimuove un attributo extra dal modello.

```php
// Esempio di utilizzo
$user->removeExtraAttribute('temporary_token');
```

### Come utilizzare HasExtraTrait

Per utilizzare il trait in un modello:

```php
use Modules\Xot\Models\Traits\HasExtraTrait;

class User extends Model
{
    use HasExtraTrait;
    
    // Resto della classe...
}
```

### Correzioni PHPStan

Correzioni apportate per risolvere gli errori di PHPStan:
- Implementato il trait `HasExtraTrait` che era mancante
- Corretto il metodo `setExtraAttribute` per gestire correttamente gli attributi schemaless senza utilizzare il metodo `set()` non disponibile
- Corretto il metodo `removeExtraAttribute` usando `unset()` invece del metodo `forget()` non disponibile

### Collegamenti bidirezionali
- [Documentazione modello BaseExtra](../module_xot.md#modelli)
- [Contratti del modulo Xot](contracts.md)
- [Correzioni PHPStan](phpstan_fixes.md) 
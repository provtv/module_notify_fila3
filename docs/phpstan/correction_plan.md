# Piano di Correzione PHPStan Livello 9

## Stato Attuale
- Livello corrente: 7
- Errori totali: 449
- Moduli interessati: Xot, User, Media, Blog, etc.

## Strategia di Correzione

### 1. Preparazione Ambiente
```bash
# Configurazione analisi completa
./vendor/bin/phpstan analyse --level=9 --configuration=phpstan.neon modules/* > phpstan_level_9_initial.log

# Setup test environment
composer test-coverage
```

### 2. Prioritizzazione Interventi
1. **Modulo Xot** (Core)
   - Comandi Console
   - Servizi Core
   - Modelli Base
   - Traits Condivisi

2. **Modulo User**
   - Autenticazione
   - Gestione Ruoli
   - Team Management

3. **Altri Moduli**
   - Media
   - Blog
   - Tenant
   - UI

### 3. Standardizzazione Codice

#### 3.1 Type System
```php
// Prima
public function getUser($id) {
    return User::find($id);
}

// Dopo
public function getUser(int $id): ?User {
    return User::find($id);
}
```

#### 3.2 Generics
```php
// Prima
/** @var Collection */
private $items;

// Dopo
/** @var Collection<int, User> */
private $items;
```

#### 3.3 Null Safety
```php
// Prima
public function getName() {
    return $this->user->profile->name;
}

// Dopo
public function getName(): ?string {
    return $this->user?->profile?->name;
}
```

### 4. Processo di Correzione per Modulo

1. **Analisi**
   ```bash
   ./vendor/bin/phpstan analyse --level=9 modules/ModuleName > analysis.log
   ```

2. **Categorizzazione Errori**
   - Type hints mancanti
   - Return types non specificati
   - Null safety
   - Generics non tipizzati
   - PHPDoc incompleti

3. **Correzione**
   - Implementazione template standardizzati
   - Aggiornamento test unitari
   - Documentazione aggiornata

4. **Verifica**
   ```bash
   ./vendor/bin/phpstan analyse --level=9 modules/ModuleName
   ./vendor/bin/pest --filter=ModuleName
   ```

### 5. Best Practices Implementate

#### 5.1 Struttura Classe
```php
declare(strict_types=1);

namespace Modules\ModuleName;

/**
 * @template TKey of array-key
 * @template TValue
 */
class Example
{
    /** @var array<TKey, TValue> */
    private array $items = [];
    
    /**
     * @param TValue $value
     * @return TValue
     * @throws InvalidArgumentException
     */
    public function process($value)
    {
        // Implementation
    }
}
```

#### 5.2 Trait Usage
```php
/**
 * @template TModel of Model
 */
trait HasFactory
{
    /**
     * @return \Illuminate\Database\Eloquent\Factories\Factory<TModel>
     */
    public static function factory(): Factory
    {
        // Implementation
    }
}
```

### 6. Monitoraggio Progresso

#### 6.1 Metriche
- Errori totali
- Errori per modulo
- Coverage test
- Tempo di build

#### 6.2 Documentazione
- Aggiornamento docs/
- PHPDoc completi
- README moduli

### 7. Automazione

```yaml
# .github/workflows/phpstan.yml
name: PHPStan Analysis
on: [push, pull_request]
jobs:
  phpstan:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: PHPStan
        run: |
          composer install
          ./vendor/bin/phpstan analyse --level=9 modules/*
```

## Ordine di Esecuzione

1. **Fase 1: Core (Xot)**
   - [x] Template Command
   - [ ] Service Layer
   - [ ] Model Layer
   - [ ] Traits

2. **Fase 2: Autenticazione (User)**
   - [ ] Auth System
   - [ ] Role Management
   - [ ] Team System

3. **Fase 3: Moduli Dipendenti**
   - [ ] Media
   - [ ] Blog
   - [ ] UI

4. **Fase 4: Moduli Indipendenti**
   - [ ] Tenant
   - [ ] Notify
   - [ ] GDPR

## Collegamenti
- [PHPStan Rules](phpstan_rules.md)
- [Correzioni PHPStan](phpstan_fixes.md)
- [Template Comandi](../modules/xot/command_template.md)
- [Documentazione Modulo](../module_xot.md) 
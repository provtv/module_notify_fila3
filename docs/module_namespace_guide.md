# Guida ai Namespace dei Moduli

## Convenzioni di Namespace

Quando si lavora con i moduli nel sistema Laraxot, è importante seguire queste convenzioni di namespace:

1. Il namespace base per tutti i moduli è `Modules\`
2. **IMPORTANTE**: Il namespace completo per le classi all'interno di un modulo è `Modules\<NomeModulo>\`, NON `Modules\<NomeModulo>\app\`
3. Le classi all'interno della cartella `app` di un modulo vengono registrate automaticamente nel namespace `Modules\<NomeModulo>\`

## Esempi Corretti

- Una classe in `Modules/User/app/Models/User.php` avrà il namespace `Modules\User\Models`
- Una classe in `Modules/Xot/app/Actions/ImportAction.php` avrà il namespace `Modules\Xot\Actions`

## Esempi Errati da Evitare

- ❌ `Modules\User\app\Models` - Non includere "app" nel namespace
- ❌ `App\Modules\User\Models` - Non usare "App" come prefisso

## Implementazione nei Composer.json dei Moduli

Ogni modulo ha il suo `composer.json` che definisce l'autoloading delle classi. Assicurati che sia configurato correttamente:

```json
"autoload": {
    "psr-4": {
        "Modules\\NomeModulo\\": ""
    }
}
```

## Registrazione delle Classi nei Moduli

Le classi all'interno della cartella `app` di un modulo vengono registrate automaticamente nel namespace del modulo. Ad esempio, una classe in `Modules/User/app/Models/User.php` sarà registrata nel namespace `Modules\User\Models`.

## Collegamenti con Altri Documenti

- [[module_xot|Modulo Xot]] - Il modulo base che gestisce la struttura dei namespace
- [[modules_analysis|Analisi dei Moduli]] - Informazioni dettagliate sull'architettura dei moduli
- [[NAMESPACE-CONVENTIONS|Convenzioni Generali sui Namespace]]
- [[PHPSTAN-IMPLEMENTATION-GUIDE|Guida all'Implementazione di PHPStan]]

## Note su PHPStan

PHPStan potrebbe segnalare errori relativi ai namespace se non seguono queste convenzioni. È importante correggere questi errori per mantenere la coerenza del codice.

## Importanza del composer.json

Ogni modulo ha il proprio `composer.json` che definisce:
- Il namespace base del modulo
- La struttura delle directory
- Le dipendenze specifiche del modulo

### Regola Fondamentale
Prima di creare o modificare qualsiasi file in un modulo, è OBBLIGATORIO:
1. Leggere il `composer.json` del modulo specifico
2. Verificare la sezione `autoload.psr-4`
3. Rispettare il namespace definito

## Esempi Pratici

### 1. Modulo Fixcity
```json
// Modules/Fixcity/composer.json
{
    "autoload": {
        "psr-4": {
            "Modules\\Fixcity\\": "app/"
        }
    }
}
```
Quindi:
- ✅ Path corretto: `Modules/Fixcity/app/Models/Ticket.php`
- ✅ Namespace corretto: `Modules\Fixcity\Models\Ticket`
- ❌ Path errato: `Modules/Fixcity/Models/Ticket.php`
- ❌ Namespace errato: `Modules\Fixcity\App\Models\Ticket`

### 2. Modulo Ticket
```json
// Modules/Ticket/composer.json
{
    "autoload": {
        "psr-4": {
            "Modules\\Ticket\\": "app/"
        }
    }
}
```
Quindi:
- ✅ Path corretto: `Modules/Ticket/app/Services/TicketService.php`
- ✅ Namespace corretto: `Modules\Ticket\Services\TicketService`
- ❌ Path errato: `Modules/Ticket/Services/TicketService.php`
- ❌ Namespace errato: `Modules\Ticket\App\Services\TicketService`

## Errori Comuni da Evitare

### 1. Assumere una Struttura Standard
❌ NON assumere che tutti i moduli seguano la stessa struttura
```php
// ERRATO: Assumere che il namespace includa sempre 'app'
namespace Modules\ModuleName\App\Controllers;
```

### 2. Copiare da Altri Moduli
❌ NON copiare ciecamente la struttura da altri moduli
```bash
# ERRATO: Copiare la struttura senza verificare il composer.json
cp -r Modules/Fixcity/app/Models Modules/NewModule/app/
```

### 3. Namespace Hardcoded
❌ NON utilizzare namespace hardcoded nelle classi
```php
// ERRATO: Hardcodare i namespace nelle classi
use Modules\Fixcity\App\Models\Ticket;
```

## Best Practices

### 1. Verifica Preliminare
```bash
# Prima di creare nuovi file
cat Modules/ModuleName/composer.json | grep psr-4
```

### 2. Uso di Helper per i Namespace
```php
// Utilizzare helper per i namespace
namespace Modules\ModuleName;
use function base_path;
use function config;

class ServiceProvider
{
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
}
```

### 3. Documentazione nel README
```markdown
# ModuleName

## Struttura
Questo modulo segue la seguente struttura di namespace:
\`Modules\ModuleName\`: root directory del modulo
```

## Checklist per Nuovo Codice

1. ✅ Leggere il `composer.json` del modulo
2. ✅ Verificare la sezione `autoload.psr-4`
3. ✅ Controllare il path corretto per i nuovi file
4. ✅ Utilizzare il namespace corretto
5. ✅ Documentare la struttura nel README
6. ✅ Verificare tutti gli import

## Risoluzione Problemi Comuni

### 1. Classe Non Trovata
Se si riceve "Class Not Found":
1. Verificare il `composer.json` del modulo
2. Controllare il path del file
3. Verificare il namespace
4. Eseguire `composer dump-autoload`

### 2. Conflitti di Namespace
Se ci sono conflitti:
1. Controllare tutti i `composer.json` coinvolti
2. Verificare le dipendenze tra moduli
3. Risolvere usando namespace completi

## Note Importanti

1. **Modularità**: Ogni modulo è indipendente
2. **Consistenza**: Mantenere la struttura definita nel `composer.json`
3. **Documentazione**: Aggiornare sempre il README con la struttura
4. **Verifica**: Testare sempre l'autoloading dopo modifiche ai namespace 
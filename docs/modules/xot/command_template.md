# Template per Comandi Console - Modulo Xot

## Struttura Base
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Class NomeCommand
 *
 * @property string $description Descrizione del comando
 * @property string $signature   Firma del comando
 */
class NomeCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'xot:nome-comando {param : Descrizione} {--option=default : Descrizione}';

    /**
     * @var string
     */
    protected $description = 'Descrizione dettagliata del comando';

    /**
     * Esegue il comando.
     *
     * @throws \RuntimeException Se si verifica un errore durante l'esecuzione
     */
    public function handle(): int
    {
        try {
            // Logica del comando
            return 0; // Successo
        } catch (Throwable $e) {
            Log::error('[NomeCommand] Errore: ' . $e->getMessage(), [
                'exception' => $e,
                'params' => $this->arguments(),
                'options' => $this->options(),
            ]);
            
            $this->error($e->getMessage());
            return 1; // Errore
        }
    }

    /**
     * Metodi protected devono avere PHPDoc completo.
     *
     * @param string $param Descrizione parametro
     * @return void
     */
    protected function metodoProtected(string $param): void
    {
        // Implementazione
    }
}
```

## Best Practices

### 1. Namespace e Importazioni
- Usa `declare(strict_types=1);`
- Importa tutte le classi usate
- Raggruppa gli import per tipo (Illuminate, Custom, etc.)

### 2. PHPDoc
- Documenta la classe con descrizione e proprietà
- Documenta tutti i metodi protected/private
- Specifica sempre i tipi di ritorno
- Documenta le eccezioni lanciate

### 3. Gestione Errori
- Usa try/catch nel metodo handle
- Logga gli errori con contesto
- Ritorna sempre int (0 successo, 1+ errore)
- Usa tipi forti per i parametri

### 4. Signature
- Prefissa con 'xot:' per i comandi del modulo
- Descrivi chiaramente parametri e opzioni
- Usa convenzioni di naming consistenti

### 5. Testing
```php
namespace Tests\Unit\Console\Commands;

use Tests\TestCase;
use Modules\Xot\Console\Commands\NomeCommand;

class NomeCommandTest extends TestCase
{
    /** @test */
    public function it_executes_successfully(): void
    {
        $this->artisan('xot:nome-comando', [
            'param' => 'valore',
            '--option' => 'valore'
        ])->assertExitCode(0);
    }
}
```

## Collegamenti
- [Documentazione PHPStan](phpstan_rules.md)
- [Correzioni PHPStan](phpstan_fixes.md)
- [Modulo Xot](../module_xot.md) 
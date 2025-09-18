# Template Servizi - Modulo Xot

## Struttura Base
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use InvalidArgumentException;
use RuntimeException;
use Throwable;

/**
 * @template TModel of Model
 * @template TKey of array-key
 * @template TValue
 */
class ExampleService
{
    /**
     * @var Collection<TKey, TValue>
     */
    private Collection $items;

    /**
     * @var TModel
     */
    private Model $model;

    /**
     * @param TModel $model
     * @throws InvalidArgumentException
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->items = new Collection();
    }

    /**
     * @param array<TKey, TValue> $data
     * @return Collection<TKey, TValue>
     *
     * @throws RuntimeException
     */
    public function process(array $data): Collection
    {
        try {
            return $this->items = collect($data)->map(function ($item) {
                return $this->processItem($item);
            });
        } catch (Throwable $e) {
            throw new RuntimeException(
                sprintf('Errore durante il processing: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @param TValue $item
     * @return TValue
     *
     * @throws InvalidArgumentException
     */
    private function processItem($item)
    {
        if (!$this->validateItem($item)) {
            throw new InvalidArgumentException('Item non valido');
        }

        return $item;
    }

    /**
     * @param mixed $item
     * @return bool
     */
    private function validateItem($item): bool
    {
        return true; // Implementa la validazione
    }

    /**
     * @return Builder<TModel>
     */
    protected function getQuery(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * @param array<string, mixed> $criteria
     * @return Collection<int, TModel>
     */
    public function findBy(array $criteria): Collection
    {
        $query = $this->getQuery();

        foreach ($criteria as $field => $value) {
            $query->where($field, $value);
        }

        return $query->get();
    }

    /**
     * @param array<string, mixed> $data
     * @return TModel
     *
     * @throws RuntimeException
     */
    public function create(array $data): Model
    {
        try {
            return $this->model->create($data);
        } catch (Throwable $e) {
            throw new RuntimeException(
                sprintf('Errore durante la creazione: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @param TModel $model
     * @param array<string, mixed> $data
     * @return TModel
     *
     * @throws RuntimeException
     */
    public function update(Model $model, array $data): Model
    {
        try {
            $model->update($data);
            return $model;
        } catch (Throwable $e) {
            throw new RuntimeException(
                sprintf('Errore durante l\'aggiornamento: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @param TModel $model
     * @return bool
     *
     * @throws RuntimeException
     */
    public function delete(Model $model): bool
    {
        try {
            return (bool)$model->delete();
        } catch (Throwable $e) {
            throw new RuntimeException(
                sprintf('Errore durante l\'eliminazione: %s', $e->getMessage()),
                $e->getCode(),
                $e
            );
        }
    }
}
```

## Best Practices

### 1. Generics
- Usa `@template` per definire tipi generici
- Specifica i vincoli dei tipi (es. `of Model`)
- Documenta l'uso dei generics nelle collezioni

### 2. Type Safety
- Usa `declare(strict_types=1)`
- Definisci tutti i tipi di ritorno
- Usa type hints per i parametri
- Gestisci i null con `?` operator

### 3. Eccezioni
- Crea gerarchia di eccezioni custom
- Documenta le eccezioni lanciate
- Usa try/catch per gestire errori
- Propaga eccezioni appropriate

### 4. PHPDoc
- Documenta tutti i metodi pubblici
- Specifica i tipi generici
- Documenta le eccezioni
- Mantieni la documentazione aggiornata

### 5. Testing
```php
namespace Tests\Unit\Services;

use Tests\TestCase;
use Modules\Xot\Services\ExampleService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleServiceTest extends TestCase
{
    use RefreshDatabase;

    private ExampleService $service;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new ExampleService(new ExampleModel());
    }
    
    /** @test */
    public function it_processes_valid_data(): void
    {
        $result = $this->service->process(['test' => 'value']);
        $this->assertInstanceOf(Collection::class, $result);
    }
    
    /** @test */
    public function it_throws_exception_for_invalid_data(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->service->process(['invalid' => null]);
    }
}
```

## Collegamenti
- [PHPStan Rules](../phpstan_rules.md)
- [Correzioni PHPStan](../phpstan_fixes.md)
- [Documentazione Modulo](../module_xot.md) 
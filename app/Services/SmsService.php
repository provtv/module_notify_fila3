<?php

declare(strict_types=1);

namespace Modules\Notify\Services;

use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Classe per l'invio di SMS.
 */
class SmsService
{
    // ---------CSS------------
    public ?string $to = null;

    public ?string $from = null;

    public ?string $body = null;
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
=======
>>>>>>> ba48b8c (.)
    /**
     * Variabili per il template SMS.
     *
     * @var array<string, mixed>
     */
    public array $vars = [];

    /**
     * Driver per l'invio degli SMS.
     */
    public string $driver = 'netfun';

    private static ?self $instance = null;

    /**
     * Ottiene un'istanza singleton della classe.
     */
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
     * Factory method to create an instance.
=======
     * Factory method per creare un'istanza singleton.
>>>>>>> ba48b8c (.)
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    /**
     * Imposta variabili locali e le unisce a vars.
     * @param array<string, mixed> $vars
     */
    public function setLocalVars(array $vars): self
    {
        foreach ($vars as $k => $v) {
            $this->{$k} = $v;
        }
        $this->vars = array_merge($this->vars, $vars);
        return $this;
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
     * Unisce le variabili con quelle esistenti.
     *
=======
     * Unisce le variabili con quelle esistenti (alias per compatibilità).
>>>>>>> ba48b8c (.)
     * @param array<string, mixed> $vars
     */
    public function mergeVars(array $vars): self
    {
        return $this->setLocalVars($vars);
    }

    /**
     * Invia l'SMS utilizzando il driver configurato.
     */
    public function send(): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $engineClassName = '\\Modules\\Notify\\Services\\SmsEngines\\' . Str::studly($this->driver) . 'Engine';
=======
<<<<<<< HEAD
        $engineClassName = '\\Modules\\Notify\\Services\\SmsEngines\\' . Str::studly($this->driver) . 'Engine';
=======
        $engineClassName = '\Modules\Notify\Services\SmsEngines\\'.Str::studly($this->driver).'Engine';
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
        
=======
        $engineClassName = '\Modules\Notify\Services\SmsEngines\' . Str::studly($this->driver) . 'Engine';

>>>>>>> ba48b8c (.)
        // Verifichiamo che la classe esista
        if (!class_exists($engineClassName)) {
            throw new \RuntimeException("La classe del motore SMS {$engineClassName} non esiste");
        }

        // Verifichiamo che la classe abbia il metodo make
        if (!method_exists($engineClassName, 'make')) {
            throw new \RuntimeException("La classe {$engineClassName} non implementa il metodo make()");
        }

        // Creiamo l'istanza in modo sicuro
        $instance = $engineClassName::make();

        // Verifichiamo che l'istanza sia un oggetto
        if (!is_object($instance)) {
            throw new \RuntimeException("Il metodo make() di {$engineClassName} non ha restituito un oggetto");
        }

        // Verifichiamo che l'istanza abbia i metodi necessari
        foreach (['setLocalVars', 'send', 'getVars'] as $method) {
            if (!method_exists($instance, $method)) {
                throw new \RuntimeException("L'istanza di {$engineClassName} non implementa il metodo {$method}()");
            }
        }

        // Utilizziamo reflection per chiamare i metodi in modo sicuro
        try {
            $reflectionClass = new \ReflectionClass($instance);

            // Chiamiamo setLocalVars
            $setLocalVarsMethod = $reflectionClass->getMethod('setLocalVars');
            $setLocalVarsMethod->invoke($instance, $this->vars);

            // Chiamiamo send
            $sendMethod = $reflectionClass->getMethod('send');
            $sendMethod->invoke($instance);

            // Chiamiamo getVars
            $getVarsMethod = $reflectionClass->getMethod('getVars');
            $result = $getVarsMethod->invoke($instance);

            // Verifichiamo che il risultato sia un array
            if (!is_array($result)) {
                $result = [];
            }

            // Convertiamo l'array in array<string, mixed>
            /** @var array<string, mixed> $typedResult */
            $typedResult = [];
            foreach ($result as $key => $value) {
                if (is_string($key)) {
                    $typedResult[$key] = $value;
                }
            }

            $this->mergeVars($typedResult);
        } catch (\ReflectionException $e) {
            throw new \RuntimeException("Errore durante la chiamata dei metodi: " . $e->getMessage());
        }

        return $this;
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

    /**
     * Ottiene le variabili.
     *
     * @return array<string, mixed>
     */
    public function getVars(): array
    {
        return $this->vars;
    }
>>>>>>> 9165bf1 (.)
>>>>>>> 5a1e6f8 (fix: auto resolve conflict)
=======
>>>>>>> ba48b8c (.)
}

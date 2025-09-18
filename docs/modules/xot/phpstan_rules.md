# Regole PHPStan - Modulo Xot

## Configurazione Base
- Livello: 7 (massimo)
- Percorsi analizzati: `app/`, `config/`, `database/`, `routes/`, `tests/`
- Percorsi esclusi: `app_old/*`, `vendor/*`, `tests/coverage/*`

## Regole Principali

### 1. Controlli sui Tipi
- `checkMissingIterableValueType`: Verifica i tipi degli elementi negli iterabili
- `checkGenericClassInNonGenericObjectType`: Controllo classi generiche
- `checkMissingCallableSignature`: Verifica signature delle callable
- `checkArgumentsPassedByReference`: Controllo parametri passati per riferimento
- `checkNullables`: Gestione corretta dei tipi nullable

### 2. Regole per i Servizi
- `checkFunctionNameCase`: Consistenza nel naming delle funzioni
- Controllo tipi di ritorno
- Verifica parametri e proprietà

### 3. Regole per i Modelli
- `checkModelProperties`: Verifica proprietà dei modelli
- Controllo relazioni
- Verifica tipi delle colonne

### 4. Regole per i Test
- `inferPrivatePropertyTypeFromConstructor`: Inferenza tipi da costruttore
- Controllo assertions
- Verifica coverage

### 5. Documentazione
- `checkPhpDocMissingReturn`: Verifica documentazione return type
- Controllo completezza PHPDoc
- Verifica consistenza tipi

## Errori Temporaneamente Ignorati
```neon
- '#Method [a-zA-Z0-9\\_]+::[a-zA-Z0-9_]+\(\) has no return type specified#'
- '#Property [a-zA-Z0-9\\_]+::\$[a-zA-Z0-9_]+ has no type specified#'
```

Questi errori sono temporaneamente ignorati mentre vengono corretti sistematicamente.

## Best Practices
1. Ogni nuovo metodo deve avere:
   - Type hints per parametri
   - Return type declaration
   - PHPDoc completo

2. Proprietà delle classi:
   - Dichiarazione esplicita del tipo
   - Visibilità corretta
   - Documentazione chiara

3. Generics:
   - Uso corretto nelle collezioni
   - Documentazione dei tipi
   - Validazione a runtime

4. Test:
   - Coverage completo
   - Assertions tipizzate
   - Mock tipizzati

## Collegamenti
- [Correzioni PHPStan](phpstan_fixes.md)
- [Documentazione Modulo](../module_xot.md)
- [Analisi Errori](../../phpstan/analysis_level_7_errors.md) 
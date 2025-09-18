# Contracts del Modulo Xot

## Model Contracts

### ModelWithAuthorContract

Il `ModelWithAuthorContract` definisce l'interfaccia per i modelli che necessitano di tracciare gli autori delle modifiche.

#### Caratteristiche Chiave
- Gestione automatica dell'autore
- Tracciamento modifiche
- Relazioni con utenti
- Supporto soft deletes

[Documentazione Completa](../../laravel/Modules/Xot/docs/contracts/model-with-author-contract.md)

### ModelWithPosContract

Il `ModelWithPosContract` definisce l'interfaccia per i modelli che necessitano di gestire una posizione ordinale.

#### Caratteristiche Chiave
- Gestione automatica della posizione
- Riordinamento dinamico
- Supporto per gruppi
- Validazione delle posizioni

[Documentazione Completa](../../laravel/Modules/Xot/docs/contracts/model-with-pos-contract.md)

## Quick Links
- [ModelWithAuthorContract Implementazione](../../laravel/Modules/Xot/app/Contracts/ModelWithAuthorContract.php)
- [ModelWithAuthorContract Test](../../laravel/Modules/Xot/tests/Unit/Contracts/ModelWithAuthorContractTest.php)
- [HasAuthorTrait](../../laravel/Modules/Xot/app/Traits/HasAuthorTrait.php)
- [ModelWithPosContract Implementazione](../../laravel/Modules/Xot/app/Contracts/ModelWithPosContract.php)
- [ModelWithPosContract Test](../../laravel/Modules/Xot/tests/Unit/Contracts/ModelWithPosContractTest.php)
- [HasPosTrait](../../laravel/Modules/Xot/app/Traits/HasPosTrait.php) 
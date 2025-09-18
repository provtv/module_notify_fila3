# Actions del Modulo Xot

## Array Actions

### SaveJsonArrayAction

L'azione `SaveJsonArrayAction` fornisce funzionalità per il salvataggio sicuro di array in formato JSON.

#### Caratteristiche Chiave
- Salvataggio sicuro di array in JSON
- Gestione automatica della codifica
- Validazione dei dati
- Gestione errori robusta

[Documentazione Completa](../../laravel/Modules/Xot/docs/actions/array/save-json-array-action.md)

## Quick Links
- [Implementazione](../../laravel/Modules/Xot/app/Actions/Array/SaveJsonArrayAction.php)
- [Test](../../laravel/Modules/Xot/tests/Unit/Actions/Array/SaveJsonArrayActionTest.php)

## Database Actions

### GetFieldnamesByTablenameAction

Action per il recupero dei nomi dei campi di una tabella del database.

**Caratteristiche**:
- Recupero dinamico dei campi
- Supporto multi-database
- Caching integrato
- Validazione robusta

[Documentazione Completa](../../../laravel/Modules/Xot/docs/actions/get-fieldnames-by-tablename-action.md)
[Implementazione](../../../laravel/Modules/Xot/app/Actions/GetFieldnamesByTablenameAction.php)

## Query Actions

### GetFieldnamesByTablenameAction
Action per il recupero dei nomi delle colonne di una tabella specifica del database.

#### Caratteristiche
- Recupero automatico delle colonne
- Supporto per connessioni multiple
- Validazione robusta
- Gestione asincrona

#### Link Rapidi
- [Documentazione Completa](../../../laravel/Modules/Xot/docs/actions/query/get-fieldnames-by-tablename.md)
- [Implementazione](../../../laravel/Modules/Xot/app/Actions/Query/GetFieldnamesByTablenameAction.php)
- [Test](../../../laravel/Modules/Xot/Tests/Actions/Query/GetFieldnamesByTablenameActionTest.php)

## Export Actions

### ExportXlsByCollection

Action per l'esportazione di collezioni di dati in formato Excel (XLSX).

**Caratteristiche**:
- Supporto per Maatwebsite/Excel e PhpSpreadsheet
- Gestione asincrona tramite QueueableAction
- Supporto per traduzioni e selezione campi
- Ottimizzazione per grandi dataset

[Documentazione Completa](../../laravel/Modules/Xot/docs/actions/export/export-xls-by-collection.md)
[Implementazione](../../laravel/Modules/Xot/app/Actions/Export/ExportXlsByCollection.php) 
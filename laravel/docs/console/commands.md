# Comandi Console

## Panoramica
Questa sezione contiene la documentazione dei comandi console disponibili nel progetto.

## Comandi Principali

### Generazione Modelli
- [GenerateModelsFromSchema](Modules/Xot/docs/console/commands/generate-models-from-schema.md)
  - Genera modelli Eloquent da schema JSON
  - Supporta relazioni polimorfiche
  - Gestisce tipi di dati SQL
  - Genera migrazioni opzionali

### Importazione Database
- [ImportMdb](Modules/Xot/docs/console/commands/import-mdb.md)
  - Importa database MDB in MySQL/SQLite
  - Gestisce conversioni di tipo
  - Mantiene relazioni e vincoli
  - Supporta migrazione dati

### Esportazione Schema
- [DatabaseSchemaExport](Modules/Xot/docs/console/commands/database-schema-export.md)
  - Esporta schema in formato JSON
  - Supporta MySQL e SQLite
  - Gestisce relazioni e indici
  - Genera documentazione

## Best Practices
- Utilizzare namespace appropriati
- Validare gli input
- Gestire correttamente gli errori
- Documentare le modifiche

## Struttura
I comandi sono organizzati per modulo e seguono la convenzione di denominazione di Laravel:
```
app/Console/Commands/
├── ModuleName/
│   └── CommandName.php
└── ...
```

## Recenti Modifiche
- Aggiunta documentazione per nuovi comandi
- Migliorata la gestione degli errori
- Standardizzazione dei messaggi
- Ottimizzazione delle importazioni 
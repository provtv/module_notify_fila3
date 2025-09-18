# Comandi Console - Modulo Xot

## Panoramica
Questa documentazione descrive i comandi console disponibili nel modulo Xot.

## Comandi Disponibili

### GenerateDbDocumentationCommand
Genera documentazione in formato Markdown per lo schema del database.

```bash
php artisan xot:generate-db-documentation {schema_file} {output_dir?}
```

#### Parametri
- `schema_file`: Percorso del file schema JSON (obbligatorio)
- `output_dir`: Directory di output per i file markdown (opzionale, default: `docs/database`)

#### Formato Schema JSON
```json
{
    "database": "nome_database",
    "connection": "mysql",
    "tables": {
        "nome_tabella": {
            "columns": {
                "nome_colonna": {
                    "type": "tipo_colonna",
                    "nullable": false,
                    "default": null,
                    "extra": "auto_increment",
                    "comment": "Commento"
                }
            },
            "primary_key": {
                "columns": ["colonna_primaria"]
            },
            "indexes": {
                "nome_indice": {
                    "columns": ["colonna"],
                    "type": "index"
                }
            },
            "foreign_keys": [
                {
                    "columns": ["colonna"],
                    "referenced_table": "tabella_riferimento",
                    "referenced_columns": ["colonna_riferimento"],
                    "on_update": "CASCADE",
                    "on_delete": "CASCADE"
                }
            ],
            "record_count": 0
        }
    },
    "relationships": []
}
```

#### Output
1. File README.md con:
   - Panoramica del database
   - Indice delle tabelle
   - Collegamenti ai file delle tabelle

2. File per ogni tabella con:
   - Descrizione della tabella
   - Struttura delle colonne
   - Indici
   - Chiavi esterne

#### Test
I test unitari verificano:
- Generazione corretta della documentazione
- Gestione errori per file schema non valido
- Gestione errori per JSON non valido
- Gestione errori per struttura schema non valida

#### Best Practices
1. Validazione input:
   - Verifica esistenza file schema
   - Validazione JSON
   - Controllo struttura schema

2. Gestione errori:
   - Logging dettagliato
   - Messaggi di errore chiari
   - Exit code appropriati

3. Type Safety:
   - Strict types abilitati
   - Type hints per tutti i parametri
   - Return type declarations

## Collegamenti
- [Template Comandi](command_template.md)
- [Regole PHPStan](phpstan_rules.md)
- [Test Unitari](../../../laravel/Modules/Xot/tests/Unit/Console/Commands/GenerateDbDocumentationCommandTest.php)

## DatabaseSchemaExporter

Per la documentazione dettagliata del comando DatabaseSchemaExporter, vedere [DatabaseSchemaExporter Command](../../laravel/Modules/Xot/docs/commands/database-schema-exporter.md).

Il comando DatabaseSchemaExporter fornisce:
- Esportazione dello schema del database
- Supporto per connessioni multiple
- Output formattato delle tabelle
- Integrazione con Artisan

### Collegamenti rapidi
- [Implementazione](../../laravel/Modules/Xot/Console/Commands/DatabaseSchemaExporterCommand.php)
- [Documentazione tecnica](../../laravel/Modules/Xot/docs/commands/database-schema-exporter.md)
- [Test](../../laravel/Modules/Xot/tests/Unit/Console/Commands/DatabaseSchemaExporterCommandTest.php)

## Utilizzo comune
I comandi sono particolarmente utili per:
- Gestione del database
- Operazioni di manutenzione
- Automazione dei task
- Supporto allo sviluppo 
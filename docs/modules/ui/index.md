# Modulo UI - Documentazione

## Panoramica
Il modulo UI fornisce componenti e funzionalità per l'interfaccia utente dell'applicazione, con particolare attenzione ai componenti Filament.

## Struttura
- `app/Enums`: Enumerazioni utilizzate per la configurazione dell'UI
- `app/Filament`: Componenti Filament personalizzati
- `app/Filament/Actions`: Azioni Filament personalizzate
- `app/Filament/Forms`: Componenti Forms personalizzati

## Funzionalità principali

### Gestione del Layout delle Tabelle
Il modulo implementa un sistema di toggle del layout delle tabelle tra visualizzazione a griglia e a lista.

Componenti chiave:
- `TableLayoutEnum`: Enumeration con i tipi di layout disponibili (LIST, GRID)
- `TableLayoutTrait`: Trait con funzionalità per gestire il salvataggio e recupero del layout dalla sessione
- `TableLayoutToggleTableAction`: Azione per cambiare layout durante la visualizzazione

```php
// Esempio di utilizzo nell'action setup
$table->headerActions([
    TableLayoutToggleTableAction::make(),
]);
```

Per implementare questa funzionalità in una pagina ListRecords, è necessario che la classe:
1. Implementi l'interfaccia `HasTableLayout`
2. Implementi i metodi richiesti (`getLayoutView()`, `setLayoutView()`, `resetTable()`)
3. Fornisca metodi per entrambi i tipi di colonne (`getGridTableColumns()`, `getListTableColumns()`)

## Form Components
Il modulo include diversi componenti personalizzati per i form Filament:

- `PasswordStrengthField`: Campo password con indicatore di robustezza
- `TreeField`: Campo per visualizzare e selezionare dati gerarchici ad albero

## Correzioni PHPStan

### Correzioni effettuate
- Aggiunto metodo statico `values()` a `TableLayoutEnum` per restituire tutti i valori dell'enum
- Creato il trait `TableLayoutTrait` che era mancante e causava errori
- Corretto l'uso dei namespace nei componenti

### Errori risolti
- `Class Modules\UI\app\Filament\Actions\Table\TableLayoutToggleTableAction uses unknown trait Modules\UI\app\Filament\Actions\Table\TableLayoutTrait`

## Collegamenti bidirezionali
- [Documentazione modulo UI principale](../../module_ui.md)
- [Analisi dell'interfaccia utente](../../frontend_structure.md)
- [Componenti Filament personalizzati](../../filament/custom_components.md) 
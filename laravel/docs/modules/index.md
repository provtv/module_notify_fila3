# Documentazione Moduli

## Struttura
Ogni modulo mantiene la propria documentazione nella cartella `docs` all'interno del modulo stesso. Questa cartella contiene:

- `phpstan/`: Analisi e correzioni PHPStan
- `models/`: Documentazione dei modelli
- `contracts/`: Interfacce e contratti
- `traits/`: Trait e loro utilizzo
- `database/`: Schema e migrazioni
- `features.md`: Funzionalità del modulo
- `roadmap.md`: Piano di sviluppo

## Moduli Attivi

### Core
- [Xot](xot.md) - Modulo base con funzionalità core
- [User](user/index.md) - Gestione utenti e autenticazione
- [Tenant](tenant/index.md) - Multi-tenancy

### UI/UX
- [UI](ui.md) - Componenti UI riutilizzabili e livewire
  - [DarkModeSwitcher](/Modules/UI/docs/components.md#darkmodeswitcher) - Toggle tema chiaro/scuro
- [CMS](cms.md) - Gestione dei contenuti e dei temi
  - [Compilazione Temi](/Modules/Cms/docs/theme_compilation.md) - Processo di compilazione e pubblicazione dei temi
  - [Errori Vite](/Modules/Cms/docs/theme_compilation.md#errore-unable-to-locate-file-in-vite-manifest) - Risoluzione problemi con Vite

### Funzionalità
- [Activity](activity.md) - Log delle attività
- [AI](ai.md) - Integrazione intelligenza artificiale
- [Rating](rating/index.md) - Sistema di valutazione

## Collegamenti
- [Analisi PHPStan](/docs/phpstan.md)
- [Best Practices](/docs/best_practices.md)
- [Contratti](/docs/Contracts.md)
- [Modelli](/docs/Models.md)
- [Temi](/docs/themes.md)

## Note per gli Sviluppatori
1. Mantenere aggiornata la documentazione del proprio modulo
2. Aggiungere collegamenti bidirezionali con la documentazione root
3. Seguire le linee guida PHPStan per ogni modulo
4. Documentare ogni correzione o modifica significativa 

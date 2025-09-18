# PHPStan Fixes Summary

## Ultima modifica: 2025-04-16

### Modulo: Xot
- **File:** `Modules/Xot/app/Contracts/ModelWithAuthorContract.php`
- **Tipo di intervento:** Risoluzione conflitti git, uniformazione tipizzazione e PHPDoc, aggiunta firme metodi autore/editor secondo standard Laraxot/PTVX e PHPStan Level 9.
- **Documentazione aggiornata:** [docs/contracts/model-with-author-contract.md](../Modules/Xot/docs/contracts/model-with-author-contract.md)
- **Link bidirezionale:** vedi sezione "Fix/Modifiche recenti" in [model-with-author-contract.md](../Modules/Xot/docs/contracts/model-with-author-contract.md)

### Note
- Per la validazione PHPStan, occorre sistemare le dipendenze vendor (vedi errore larastan/larastan/bootstrap.php).
- Proseguire con la stessa metodologia per tutti i file con conflitti git individuati.

---

## Come contribuire
Ogni modifica ai contracts o ai modelli che impatta la compatibilità PHPStan o la struttura dei contracts deve essere documentata qui e nella relativa documentazione di modulo.

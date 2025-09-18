#!/bin/sh

if [ "$1" ]; then
     echo "Processing branch: $1"
else
    echo 'Aggiungere il branch: ./bashscripts/git_trim_history_recursive.sh <branch>'
    exit 1
fi

me=$( readlink -f -- "$0";)
branch=$1
where=$(pwd)

# Processa ricorsivamente i submoduli
git submodule foreach "$me" "$branch"

# Salva l'attuale branch
current_branch=$(git rev-parse --abbrev-ref HEAD)

# Passa al branch target se non ci siamo già
if [ "$current_branch" != "$branch" ]; then
    git checkout $branch
fi

# Crea un backup del branch
backup_branch="${branch}_backup_$(date +%Y%m%d%H%M%S)"
git branch $backup_branch

# Mantieni solo gli ultimi 5 commit
git reset --soft HEAD~5
git commit -m "Mantiene gli ultimi 5 commit della storia"

# Opzionalmente, puoi eseguire un repack degli oggetti Git
git gc --aggressive --prune=now

# Push con cautela - usa -f solo se sei sicuro
echo "Eseguire il push con: git push -f origin $branch"
echo "ATTENZIONE: Informare il team di eseguire 'git pull --rebase' dopo questa operazione"

echo "Branch di backup creato: $backup_branch"
echo "-------- END [$where ($branch)] ----------";
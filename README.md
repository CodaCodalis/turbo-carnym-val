# turbo-carnym-val: Quiz zur Prüfungsvorbereitung

Um auf den aktuellen Stand zu kommen:
1. Projekt mit ``git pull`` ziehen
2. alles in die VM (/var/www/carynym/) kopieren
3. Datenbankdatei ../db/quiz.sql importieren ``mysql –u username –p database_name < quiz.sql``

Um eigene Änderungen hochzuladen:
1. Datenbank dumpen ``mysqldump -u username -p database_name > quiz.sql``
2. quiz.sql aus VM in Entwicklungsordner auf Hostsystem (../db/) kopieren
3. im Entwicklungsordner ``git add .``
4. ``git commit -m "Beschreibung des Commits"``
5. ``git push origin master``

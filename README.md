# turbo-carnym-val: Quiz zur Prüfungsvorbereitung

Um auf den aktuellen Stand zu kommen:
1. Gemeinsamen Ordner in VM (/var/www/carnym/) und Hostsystem (~/Entwicklung/turbo-carnym-val/) anlegen
2. auf dem Hostsystem Projekt mit ``git pull`` ziehen
3. in der VM Datenbankdatei (/var/www/carnym/db/quiz.sql) importieren ``mysql –u username –p database_name < quiz.sql``

Um eigene Änderungen hochzuladen:
1. in der VM Datenbank dumpen ``mysqldump -u username -p database_name > quiz.sql``
2. Gedumpte quiz.sql gegebenenfalls in den Projetordner (/var/www/carnym/db/) kopieren
3. auf Hostsystem im Entwicklungsordner ``git add .``
4. ``git commit -m "Beschreibung des Commits"``
5. ``git push origin master``

Konflikte im sql dump file sind eher nicht auflösbar, daher sollte jede Veränderung an der Datenbank abgesprochen sein.

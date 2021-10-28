# turbo-carnym-val: Quiz zur Prüfungsvorbereitung

Um auf den aktuellen Stand zu kommen:
1. Gemeinsamen Ordner in VM (/var/www/carnym/) und Hostsystem (~/Entwicklung/turbo-carnym-val/) anlegen
2. auf dem Hostsystem Projekt mit ``git pull`` ziehen
3. in der VM Datenbankdatei (/var/www/carnym/db/db_name.sql) importieren ``mysql –u username –p database_name < db_name.sql``

Um eigene Änderungen hochzuladen:
1. in der VM Datenbank dumpen ``mysqldump -u username -p database_name > db_name.sql``
2. auf Hostsystem im Entwicklungsordner ``git add .``
3. ``git commit -m "Beschreibung des Commits"``
4. ``git push origin master``

Konflikte im sql dump file sind eher nicht auflösbar, daher sollte jede Veränderung an der Datenbank abgesprochen sein.

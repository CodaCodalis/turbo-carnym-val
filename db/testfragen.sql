INSERT INTO `rollen` (`name`) VALUES
('Administrator'),
('Frageersteller'),
('Spieler');

INSERT INTO `user` (`name`, `passwort`, `role_id`) VALUES
('admin', 'qwerty', 1);

INSERT INTO `kategorien` (`name`) VALUES
('Programmierung'),
('Netzwerk'),
('Datenschutz'),
('Betriebssysteme'),
('Allgemeinwissen der IT'),
('Lizenzen'),
('Marketing und Marktforschung'),
('Datenschutz und Datensicherheit');

INSERT INTO `fragen` (`fragetext`, `user_id`) VALUES
('Wann stellte Linus Torvalds die erste Version seines Kernels online?', 1),
('Wofür steht die Abkürzung ".pdf"?', 1),
('Wie heißt der Ethernet-Steckverbinder?', 1),
('Wofür steht GNU GPL?', 1),
('Wer ist Richard Stallman?', 1),
('Wofür stehen die 4 Ps des Marketings?', 1),
('Was ist Ransomware? Ransomware...', 1),
('Wofür steht ABC-Analyse in der Marktforschung?', 1),
('Was ist eine IDE?', 1),
('Wofür steht die Abkürzung JSON?', 1);

INSERT INTO `antworten` (`antworttext`, `wahrheit`, `frage_id`) VALUES
('01.01.1995', 0, 1),
('17.09.1991', 1, 1),
('23.07.2004', 0, 1),
('12.01.1985', 0, 1),
('Portable Document File', 0, 2),
('Printable Data Format', 0, 2),
('Portable Document Format', 1, 2),
('Printable Document File', 0, 2),
('HaJo Krüger', 0, 3),
('RJ-45', 1, 3),
('PJ Harvey', 0, 3),
('RJ-11', 0, 3),
('GNU General Public License', 1, 4),
('GNU Grams Per Liter', 0, 4),
('GNU Gas Petroleum Liquids', 0, 4),
('GNU Glycerophospholipid', 0, 4),
('Autor von Windows 3.11', 0, 5),
('Mitglied der Band O-Zone', 0, 5),
('Begründer der GNU GPL', 1, 5),
('Designer des ersten iPhones', 0, 5),
('Public Private Partnership Project', 0, 6),
('Polska Partia Przyjaciól Piwa', 0, 6),
('Prison Pet Partnership Program', 0, 6),
('Product Price Place Promotion', 1, 6),
('...verschlüsselt gespeicherte Inhalte auf dem Opfer-System und setzt dem Benutzer ein Ultimatum, zur Zahlung eines Lösesgeldes.', 1, 7),
('...ist der empfohlene Kleidungsstil bei Lösegeldforderungen.', 0, 7),
('...bezeichnet den zufälligen Zugriff auf Hardware-Komponenten, um Arbeit vorzutäuschen', 0, 7),
('...bezeichnet ein Programm, das als nützliche Anwendung getarnt ist, im Hintergrund aber ohne Wissen des Anwenders eine andere Funktion erfüllt.', 0, 7),
('Analysepunkte: Absatz, Beziehung, Controlling', 0, 8),
('Analyse der Alphabetisierungsrate in der Kundschaft', 0, 8),
('Prüfung des Automatic Binary Computers', 0, 8),
('Priorisierung der Kunden (A - sehr wichtig, B - wichtig, C - weniger wichtig)', 1, 8),
('Sammlung von Computerprogrammen, mit denen die Aufgaben der Softwareentwicklung möglichst ohne Medienbrüche bearbeitet werden können.', 1, 9),
('Programme auf Servern, die dem Administrator die Möglichkeit geben, schnell und zuverlässig neue Services anzulegen oder bestehende zu bearbeiten', 0, 9),
('Integrated Development Environment', 0, 9),
('Interdependent Data Exchange', 0, 9),
('Java Simple Object Notation', 0, 10),
("John's Self-Organized Network", 0, 10),
('Java Script Object Notation', 1, 10),
('Java Service Oriented Network', 0, 10);

INSERT INTO `frage_kategorie` (`frage_id`, `kategorie_id`) VALUES
(1, 5), 
(1, 4),
(2, 5),
(3, 2),
(4, 6),
(5, 5),
(6, 7),
(7, 8),
(8, 7),
(9, 1),
(9, 5),
(10, 1);

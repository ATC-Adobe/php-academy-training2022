### Xdebug
- port: 9009
- ssh port: 12000
- remote project files path `/var/www/php`
- xdebug tunnel: `ssh -R 9009:127.0.0.1:9009 xdebug@<remote-address> -p 12000`
- ssh xdebug password (for tunnel): `xdebug`

==============

Zadania: 
1. Dodanie kolumny id_user (foreign key), pola id_user w klasie Reservation, a do niego gettera i settera 
2. User musi mieć dostęp do wszystkich rezerwacji. 
3. Dodanie listingu Moje rezerwacje i zakładki w menu prowdzącej do niego - tylko dla zalogowanych. 
4. User po zalogowaniu widzi Moje rezerwacje. 
5. Od teraz dodawać rezerwacje może tylko zalogowany user.
6. Sprawdzanie - czy salka jest wolna. 
7. Walidacja w formularzu rezerwacji: sprawdzenie czy od < do + walidacja na backendzie.


=============

Materiały: 
- Mechanizm sesji w PHP 
  - https://www.php.net/manual/en/features.sessions.php 
  - https://www.php.net/manual/en/book.session.php 
- Przejrzyjce zwłaszcza: 
  - session_start() 
    - ze zwróceniem uwagi, gdzie u was w kodzie powinno sie znaleźć 
  - session_id() 
  - session_destroy() 
  - session_unset() 
  - session_write_close() / session_commit()

- W skrócie: https://www.guru99.com/cookies-and-sessions.html

- Session ID 
  - https://stackoverflow.com/questions/1370951/what-is-phpsessid
- Rzućcie okiem tutaj na wiki, ale nie zagłębiajcie się zbyt mocno (security)*
    - https://en.wikipedia.org/wiki/Session_fixation
- https://en.wikipedia.org/wiki/Session_fixation#Regenerate_SID_on_each_request
  Jak ktoś zaimplementuje nowy SID na każdym requeście to ukradnę dla Niej/Niego cukierki z recepcji ;p
  Oczywiście dane w sesji nie mogą być przy tym "gubione"
  Tablica superglobalna $_SESSION, z niej odczytujecie / zapisujecie dane

https://www.php.net/manual/en/reserved.variables.session.php
Komunikaty / Alerty

https://getbootstrap.com/docs/4.0/components/alerts/
https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-alerts.php
https://www.quackit.com/bootstrap/bootstrap_4/tutorial/bootstrap_alerts.cfm (dodatkowe plusy w moich oczach za kreatywność :D)

Zadania: 
1. Dodać link w menu Wyloguj (przed/za Logowanie i Rejestracja) 
2. "Kontrolery" dla logowania i rejestracji Usera + model i repozytorium dla Usera 
   - zanim ruszycie z modelem Usera, przemyślcie jakie ma posiadać właściwości(prioperties) Tj. co dodać do tabeli user i formularza rejestracji, użycie przy okazji "ALTER TABLE xyz ADD ..." (column) mile widziane 
3. Utworzenie klasy Authenticator ( metody: - login(string $username, string $password) - co będzie zwracać? jak zapiszecie informacje, ze User jest zalogowany? 
- pytania do Was 
  - register(string $username, string $password1, string $password2, string $email, itp...) - co będzie zwracać? 
  - logout() + inwencja twórcza ). 
4. Zapisywanie w sesji informacji, czy user jest zalogowany 
   - Bazując na tej informacji edytować menu, tak aby wyświetlało Logowanie i Rejestracja lub Wyloguj - a może jeszcze wyświetlanie jakiegoś "Cześć $firstname !" w menu? 
5. Wprowadzenie mechanizmu walidacji, wyświetlanie komunikatów (w oparciu o sesje i np. alerty z bootstrapa) - np. Div message-box w headerze podstron, ktory pojawia się, gdy jest jakiś message w sesji 
   - walidacja logowania i rejestracji(np. dlugosc hasel, wymagane znaki, czy user/email już istnieje w bazie itd itp) Po stronie frontendu - np. wymagana min dlugosc hasla itp i rownież na backendzie - informacja o wylogowaniu

Refactor tj.
Pozbycie sie wszędzie bezpośrednich odwołań do $_SESSION utworzenie klasy Session (podpowiedz - zastanowić się jakiego "typu" może/powinna być ta klasa, conajmniej jedną taką pisaliście) metody: get, set, create, destroy, ...
Co jeśli ktoś wykradłby naszą baze z loginami i hasłami użytkowników? *
jak zabezpieczyć się przed taka sytuacją? - poczytać o haszowaniu haseł i "soli" *
przerobić kolumne password w tabeli user, pod hash np. dlugości 64 *
dodać prywatna metodę w klasie Authenticator, która będzie haszować "plain" password i użyć jej w metodach logIn i register *


=========

Zadania: 
1. Dołożenie przycisku Usuń do listy rezerwacji. 
2. Wykorzystanie klasy ReservationRepository – dopisanie metody usuwającej rezerwację z bazy danych. 
3. Podpięcie akcji usunięcia rezerwacji pod przycisk.
4. Utworzyć w bazie danych tabelę user.
5. Utworzyć nowe podstrony z formularzami: rejestracji, logowania (nickname, email, haslo) - na tym etapie jeszcze bez logiki backendowej. 
6. Dodać w menu Logowanie i Rejestracja

========

Teoria: Relacje w bazach danych, Foreign Key

Materiały: 
- Indeksy w MySQL: 
  - http://www.krysinski.eu/indeksy-w-mysql/
  - https://www.mysqltutorial.org/mysql-primary-key/ 
  - https://www.mysqltutorial.org/mysql-index/mysql-create-index/ 
- Relacje w MySQL: 
  - https://www.techrepublic.com/article/relational-databases-defining-relationships-between-database-tables/ 
  - http://www.informit.com/articles/article.aspx?p=27281&seqNum=3

Zadania: 
1. Utworzyć klasę Reservation. 
2. Utworzyć tabelę reservation w bazie danych (dodać Foreign Key na kolumnie room_id, upewnić się, że istnieje kolumna id w tabeli Room i ma zdefiniowany primary_key). 
3. Dodać w klasie ReservationRepository metody: zapisu do/ odczytu z bazy danych (jeśli jeszcze ich nie ma). 
4. Wypisać listę rezerwacji z bazy danych poniżej listingu rezerwacji odczytywanych z pliku. 
5. Przy każdej rezerwacji na listingu wyświetlić nazwę sali, dla której jest zrobiona rezerwacja (umożliwia to relacja między tablami reservation i room) 
5. *Zapis do pliku rezerwacji .csv, .json, .xml
6. *Użycie wzorców: Strategia i Fabryka

*Strategia posłuży w tym projekcie do wyboru, czy rezerwacja ma się zapisywać w pliku CSV, Json, XML, czy w bazie danych.
Strategia umożliwi utworzenie jednej klasy (np. ReservationService), która będzie tworzyć nową rezerwację, niezależnie od tego, czy ma ją zapisać w bazie danych, czy w jednym z plików. Klasa ta nie będzie wiedziała, gdzie ma zapisywać dane. 
Użytkownik aplikacji będzie decydować w jakim źródle chce zapisać rezerwację. Można to zrealizować np. w taki sposób:
w formularzu dodawania rezerwacji pojawią się 4 przyciski do wyboru
(Zapisz w bazie danych, Zapisz w pliku CSV, Zapisz w pliku JSON, Zapisz w pliku XML)

========================

Teoria: Autoloading, Encje

Materiały: 
1. Autoloading 
   * dokumentacja php: https://www.php.net/manual/en/language.oop5.autoload.php 
   * aktualny standard: https://www.php-fig.org/psr/psr-4/examples/ 
   * blog: https://jkalasz.pl/aplikacje/autoloading-w-php-czyli-jak-dziala-composer/ 
2. Encje 
   * An entity is the real world object that is represented in database 
   * Definicja encji z Doctrine: https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html#what-are-entities 
   * https://en.wikipedia.org/wiki/Mutator_method 
3. Quality Tools 
   * Code Sniffer: https://github.com/squizlabs/PHP_CodeSniffer 
   * Mess Detector: https://phpmd.org/download/index.html 
   * CS Fixer https://github.com/FriendsOfPHP/PHP-CS-Fixer

Zadania: 
1. Dodanie autoloadingu (autoloading.php) 
2. Rozmieszczenie plików w katalogach (Reservation [Model, Service, Repository], Room [Model, Service, Repository], System [File, Database], Controller, View, layout, Form) 
3. Utworzyć plik .php z formularzem dodawania sal. 
4. Dodać w menu Dodaj Salę z linkiem do formularza dodawania sal. 
5. Utworzyć klasę RoomService i Room.
6. Utworzyć gettery i settery dla pól odwzorowujących kolumny w bazie danych. 
7. Zapisywanie danych encji klasy Room w bazie danych. 
8. Utworzenie dla każdej klasy poprawnego namespace-a

Menu powinno znaleźć się w katalogu layout i powinno być wyświetlane we wszystkich widokach i formulrzach.
Do katalagu Controller wrzucić akcje, czyli w tym wypadku
plik, do którego jest przekierowanie z formularza dodawania rezerwacji oraz
plik, do którego jest przekierowanie z formularza dodawania sali.
Do widoków (View) wrzucamy pliki odpowiedzialne za wyświetlanie danych otrzymanych z backendu, w tym wszystkie listingi. Style powinny się znaleźć w oddzielnych plikach css w katalogu layout\css


===============

Teoria: 
- Wzorzec projektowy: Singleton 
- Składnia SQL 
- Wprowadzenie do połączenia z bazą danych 
- Podpięcie bazy danych do PHPStorma - PDO

Materiały: 
- Singleton: 
  - https://lukasz-socha.pl/php/wzorce-projektowe-cz-1-singleton/ 
  - https://designpatternsphp.readthedocs.io/pl/latest/Creational/Singleton/README.html 
  - https://refactoring.guru/design-patterns/singleton/php/example 
- SQL: 
  - A lot of examples: https://www.w3schools.com/sql/sql_intro.asp 
  - Official Documentation: https://dev.mysql.com/doc/mysql-getting-started/en/ 
  - https://www.mysqltutorial.org/basic-mysql-tutorial.aspx 
  - https://www.mysqltutorial.org/mysql-create-table/ 
- PDO: 
  - https://www.w3schools.com/php/php_mysql_connect.asp 
  - Additional information about PHP: 
  - https://www.php.net/manual/en/language.oop5.static.php 
  - https://www.php.net/manual/en/language.oop5.magic.php 
  - https://x-coding.pl/blog/developers/magiczne-metody-php/

Zadania: 
1. Utworzenie klasy Connection, która będzie miała metodę tworzącą połączenie z bazą danych 
   - klasa ta ma być Singleton-em 
   - połącznie z bazą danych przez PDO 
2. Utworzenie tabeli room i wprowadzenie wartości do bazy danych (insert z konsoli PhpStorm) 
3. Zastąpić dane w listingu sal, do tej pory pobieranych z pliku .xml, danymi z bazy danych 
4. *Ćwiczenia z SQL (select, insert, update, delete)

==============

Teoria: 
1. Podstawy XML 
   * https://www.w3.org/standards/xml/core.html 
   * https://www.w3schools.com/php/php_xml_parsers.asp 
2. SimpleXML 
   * https://www.php.net/manual/en/simplexml.examples-basic.php 
3. Różne opcje operacji na XML w PHP (nie trzeba wszystkiego czytać, do tego projektu wystarczy SimpleXML) 
   * https://stackoverflow.com/questions/3577641/how-do-you-parse-and-process-html-xml-in-php 
   * https://www.php.net/manual/en/refs.xml.php

Zadania: 
1. Zrobić menu z użyciem Bootstrapa (karty: Home - prowadzi do listingu sal, Wszystkie Rezerwacje) 
2. Zastąpić dane na sztywno wypisane w listingu sal, danymi z pliku xml - utworzyć plik xml z danymi do listingu sal - użyć PHP do pobierania danych z pliku - wyświelić dane w formie tabeli 
3. Utworzyć plik json z danymi do listingu sal i wyświetlić analogicznie do poprzedniego punktu

================

Teoria: 
- Podstawy programowania obiektowego: 
- Klasy abstrakcyjne 
- Interfejsy 
- Dziedziczenie 
- Enkapsulacja 
- Polimorfizm 
- Metody HTTP: GET, POST

Materiały: 
- PHP OOP: 
  - Rozdziały 6 i 7 z: 
  - https://accenture.percipio.com/books/a9273992-505f-4aa5-a306-5ac87e672f05 
  - https://www.w3schools.com/php/ 
- Metody http: 
  - https://www.w3schools.com/tags/ref_httpmethods.asp 
  - http://www.steves-internet-guide.com/http-basics/
- SPL: 
  - https://www.php.net/manual/en/class.splfileobject.php 
  - https://www.php.net/manual/en/function.fopen.php 
  - https://www.php.net/manual/en/splfileobject.fread.php 
  - https://www.php.net/manual/en/splfileobject.fwrite.php 
  - https://www.php.net/manual/en/splfileobject.fputcsv.php 
  - https://www.php.net/manual/en/splfileobject.fgetcsv.php

W tym dniu po raz pierwszy będzie trzeba użyć PHP 
1. Akcja na przyciskach Zarezerwuj listingu sal (GET) 
   - zastąpienie pliku .html z listingiem sal plikiem .php 
   - zastąpienie pliku .html z formularzem rezerwacji plikiem .php 
   - po kliknięciu na przycisk Zarezerwuj przekierowanie do pliku z formularzem rezerwacji 
   - przesłanie parameterem w requeście nazwy sali 
   - wyświetlenie nazwy sali nad formularzem rezerwacji 
2. Akcja na przycisku submit formularzu dodawania rezerwacji (POST) 
   - utworzenie klasy (ReservationService), która obsłuży dodawanie rezerwacji, zapisanie danych wysłanych formularzem do pliku .csv (użyć SplFileObject) 
   - przekierowanie do listingu rezerwacji 
   - zastąpienie pliku .html z listingiem rezerwacji plikiem .php 
   - *wyświetlenie komunikatu, o powodzeniu lub niepowodzieniu operacji dodania do pliku 
3. Odczyt z pliku: listing rezerwacji od teraz pobiera dane z pliku .csv. Utworzenie klasy, która obsłuży pobieranie rezerwacji

=================

Do zapoznania się kolejno: 
1. Koncepcja Walking skeleton 
   * https://codeclimate.com/blog/kickstart-your-next-project-with-a-walking-skeleton/ 
   * https://www.swiatprzywodztwa.pl/walking-skeleton-zwinne-realizowanie-projektow/ 
2. Podstawy HTML 
   * Informacje ogólne 
     - https://www.w3schools.com/html/default.asp 
     - https://accenture.percipio.com/books/ce87ebc7-f0cc-4749-bcc2-afa18b479df3 
     - Rozdziały I i II 
   * Formularze 
     - http://how2html.pl/form-html/ 
3. CSS/Bootstrap 
   * Podstawy CSS 
     - https://www.w3schools.com/css/css_intro.asp 
   * Bootstrap 
     - https://getbootstrap.com/docs/4.4/getting-started/introduction/

Zadania: 1. Stworzyć listę sal z użyciem HTML + CSS + Bootstrap
- najlepiej wykorzystać do tego tabelę 
- przy każdej sali przycisk Zarezerwuj - dane: rooms.txt 
- kliknięcie przycisku Zarezerwuj ma powodować przeniesienie na stronię z formmularzem rezerwacji (który będzie utworzony w następnym podpunkcie) 
2. Utworzenie pliku html z formularzem rezerwacji. Formularz ma się składać z następujących pól: 
- imię 
- nazwsko 
- adres e-mail 
- od (data i godzina rozpoczęcia razerwacji) 
- do (data i godzina zakończenia razerwacji) 
- przycisk Zapisz 
- Kliknięcie przycisku Zapisz przekierowuje na stronę z listą rezerwacji (która będzie utworzona w kolejnym punkcie)

Style z Bootstrap-a, ewentualnie CSS
Stworzyć listę rezerwacji z użyciem HTML + CSS + Bootstrap
Przykładowe dane: reservations.txt
Wszystkie strony powinny posiadać przynajmniej podstawowe ostylowanie - Bootstrap-a i/lub czysty CSS.
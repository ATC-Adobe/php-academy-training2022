### Xdebug
- port: 9009
- ssh port: 12000
- remote project files path `/var/www/php`
- xdebug tunnel: `ssh -R 9009:127.0.0.1:9009 xdebug@localwsl.com -p 12000`
- ssh xdebug password (for tunnel): `xdebug`

# Spryker

### Krok 0
Materiały: 
- https://docs.spryker.com/docs/scos/dev/architecture/conceptual-overview.html#application-separation 
- struktura aplikacji 
  - https://docs.spryker.com/docs/scos/dev/architecture/programming-concepts.html

Zadania:

Instalacja Spryker Demo Shop na maszynie wirtualnej. (szczegółowa instrukcja instalacji)
Podpięcie projektu w PhpStorm, połączenie bazy danych, xdebug w PhpStorm
Zapoznanie się z serwisami udostępnianymi przez Sprykera (http://spryker.local/):
- MailHog (mail_catcher)
- RabbitMq (broker)
- Swagger UI
- Redis Commander
- Jenkins (scheduler)
- Log Viewer

## Lesson 15

Materiały 
- RabbitMq 
  - https://www.rabbitmq.com/tutorials/tutorial-one-php.html 
  - http://blogs.quovantis.com/rabbit-mq-working/ 
  - https://www.cloudamqp.com/blog/part1-rabbitmq-for-beginners-what-is-rabbitmq.html

Zadania: 
1. Do projektu dodać bibliotekę php-amqplib/php-amqplib i zmienić ustawienia, tak by projekt łączył się z kontenerem z RabbitMQ. 
2. Wejść do panelu zarządzania kolejkami (poszukajcie jak; login i hasło: rabbitmq) i zobaczyć jakie są zakładki i funkcje. 
3. Utworzyć nową kolejkę z poziomu kodu. Sprawdzić czy jest widoczna z poziomu panelu. 
4. Zmieńcie REST API do tworzenia nowych rezerwacji salek, tak by od teraz korzystało z kolejki (nowe rezerwacje mają trafiać najpierw na kolejkę). Wiadomości z kolejki mają być pobierane i przetwarzane za pomocą klasy Consumer. Logi z działania Consumera mają być zapisywane w pliku queue.log.

## Lesson 14

Materiały: 
- PHPUnit 
  - http://itcraftsman.pl/tdd-w-php-testy-jednostkowe-z-phpunit-krok-po-kroku/ 
  - https://www.freecodecamp.org/news/test-php-code-with-phpunit/ 
  - https://phpunit.readthedocs.io/en/9.5/

Zadania: 
1. Za pomocą Composera zainstalować bibliotekę phpunit/phpunit w wersji ^9.5 
2. W głównym katalogu projektu utworzyć katalog Test a w nim folder Unit. W tym folderze będziecie tworzyć kolejne podfoldery, którę mają odzwierciedlać ścieżkę do testowanej klasy, np. test dla klasy Reservation/Model.php będzie się znajdował w klasie Test/Unit/Reservation/ModelTest.php. 
3. Utworzyć pierwszą klasę Test.php, w której będziecie pisać pierwsze testy i asercje. Napiszcie 5 różnych testów, które będą sprawdzały różnego rodzaju asercje np. assertTrue, assertEquals. W dokumentacji znajdźcie asercje innego rodzaju. 
4. W projekcie utworzyć klasę Calculate.php, która będzie zawierała metodę calculate. Metoda ta ma przyjmować dwa argumenty typu int (składniki działania) oraz jeden argument typu string (typ działania: +,-,*). Metoda ma zwracać wynik typu int (jak można do zdefiniować w PHP?). Utwórzcie odpowiednią klasę w folderze z testami. Do przekazywania danych do metody testującej użyjcie DataProvider, który dla każdego typu działania ma testować jedno poprawne i jedno błędne założenie (true/false). 
5. Utwórzcie nową klasę z odpowiednią ścieżką, która będzie testowała metodę sprawdzającą czy data rezerwacji salki spełnia kryteria (od < do, od > teraz). Zastanówcie się czy nie trzeba dokonać refaktoryzacji kodu, aby można było napisać taki test. 
6. Napisać testy, które sprawdzają czy rezultat zwracany z metod API jest poprawny z założonym wynikiem w teście. Należy użyć obiektów Mock i danych testowych. Testy jednostkowe nie mogą pobierać danych z bazy. Napiszcie testy dla metod - zwracanie listy wszystkich salek (id rezerwacji, id salki, id usera, daty) - zwracanie listy rezerwacji, które są aktualne (późniejsze niż obecny czas) - zwracanie rezerwacji danego usera


## Lesson 13

Materiały: 
- GraphQl: 
  - https://bykowski.pl/nowy-nastepca-rest-poznaj-graphql/ 
  - https://www.moesif.com/blog/technical/graphql/REST-vs-GraphQL-APIs-the-good-the-bad-the-ugly/ 
- GraphQl API w PHP: 
- https://webkul.com/blog/how-to-use-graphql-in-php/

  Instalacja Composera: 
1. Przejdź do folderu cd ~ 
2. Pobierz pakiet composera curl https://getcomposer.org/installer -o composer-setup.php 
3. Zainstaluj Composer php composer-setup.php --install-dir = / usr / local / bin --filename = composer 
4. Zaktualizuj Composer composer self-update 
5. Przygotuj swój projekt: 
   1. Uruchom komendę composer init 
   2. Package name php/academy' 
   3. Authorimie i nazwisko
   4. Minimum stability -> Enter 
   5. Package Type -> Enter 
   6. License -> Enter 
   7. Would you like to define your dependencies (require) interactively [yes]? -> No 
   8. Would you like to define your dev dependencies (require-dev) interactively [yes]? -> No 
   9. Add PSR-4 autoload mapping? Maps namespace "Php\Academy" to the entered relative path. [src/, n to skip] -> No 
   10. Do you confirm generation [yes]? -> Yes 
6. W pliku composer.json dodaj sekcję '"autoload": { "psr-0": { "": [ "src/" ] } }' 
7. Uruchom komendę composer install' 
8. Możesz usunąć swój plik autoloader.php i odwołania do niego. Od tej chwili będzie używany autoloader z composera.

Zadania: 
1. Instalacja Composera. 
2. W pliku composer.json należy dodać bibliotekę webonyx/graphql-php w najnowszej wersji. Pomyślcie jak sprawić, by composer pobrał tę bibliotekę. 
3. Przygotować API, które będzie wykonywało podobne operacje do tych, które zostały utworzone przy pomocy REST API. 
4. Lista akcji: 
   - zwracanie listy wszystkich rezerwacji (id rezerwacji, id salki, id usera, daty) 
   - zwracanie listy rezerwacji, które są aktualne (późniejsze niż obecny czas) 
   - zwracanie rezerwacji danego usera 
   - tworzenie nowej rezerwacji dla danego usera ( tak jak w Lekcji 9 - sprawdzanie czy istnieje user i salka, sprawdzenie czy od < do, sprawdzanie czy od jest późnijsze niż teraz)

## Lesson 12

Zadania:
- [x] Instalacja Postman i pierwsze kroki
- [x] Zaimplementuj metody REST API, które wykonają poniższe rzeczy: 
  
Ważne jest przygotowanie odpowiedniego routera (metody), który na podstawie metody REST API będzie przekierowywał akcję do odpowiednich metod.

## Lesson 9

Zadania: 
- [x] Dodanie kolumny id_user (foreign key), pola id_user w klasie Reservation, a do niego gettera i settera 
- [x] User musi mieć dostęp do wszystkich rezerwacji. 
- [x] Dodanie listingu Moje rezerwacje i zakładki w menu prowdzącej do niego - tylko dla zalogowanych. 
- [x] User po zalogowaniu widzi Moje rezerwacje. 
- [x] Od teraz dodawać rezerwacje może tylko zalogowany user.
- [x] Sprawdzanie - czy salka jest wolna. 
- [x] Walidacja w formularzu rezerwacji: sprawdzenie czy od < do + walidacja na backendzie.


## Lesson 8

Zadania: 
- [x] Dodać link w menu Wyloguj (przed/za Logowanie i Rejestracja) 
- [x] "Kontrolery" dla logowania i rejestracji Usera + model i repozytorium dla Usera 
   - zanim ruszycie z modelem Usera, przemyślcie jakie ma posiadać właściwości(prioperties) Tj. co dodać do tabeli user i formularza rejestracji, użycie przy okazji "ALTER TABLE xyz ADD ..." (column) mile widziane 
- [x] Utworzenie klasy Authenticator ( metody: - login(string $username, string $password) - co będzie zwracać? jak zapiszecie informacje, ze User jest zalogowany? 
- pytania do Was 
  - register(string $username, string $password1, string $password2, string $email, itp...) - co będzie zwracać? 
  - logout() + inwencja twórcza ). 
- [x] Zapisywanie w sesji informacji, czy user jest zalogowany 
  - Bazując na tej informacji edytować menu, tak aby wyświetlało Logowanie i Rejestracja lub Wyloguj - a może jeszcze wyświetlanie jakiegoś "Cześć $firstname !" w menu? 
- [x] Wprowadzenie mechanizmu walidacji, wyświetlanie komunikatów (w oparciu o sesje i np. alerty z bootstrapa) - np. Div message-box w headerze podstron, ktory pojawia się, gdy jest jakiś message w sesji 
  - walidacja logowania i rejestracji(np. dlugosc hasel, wymagane znaki, czy user/email już istnieje w bazie itd itp) Po stronie frontendu - np. wymagana min dlugosc hasla itp i rownież na backendzie - informacja o wylogowaniu

Refactor tj.
- [x] Pozbycie sie wszędzie bezpośrednich odwołań do $_SESSION utworzenie klasy Session (podpowiedz - zastanowić się jakiego "typu" może/powinna być ta klasa, conajmniej jedną taką pisaliście) metody: get, set, create, destroy, ...
Co jeśli ktoś wykradłby naszą baze z loginami i hasłami użytkowników? *
jak zabezpieczyć się przed taka sytuacją? - poczytać o haszowaniu haseł i "soli" *
przerobić kolumne password w tabeli user, pod hash np. dlugości 64 *
dodać prywatna metodę w klasie Authenticator, która będzie haszować "plain" password i użyć jej w metodach logIn i register *


## Lesson 7

Zadania: 
- [x] Dołożenie przycisku Usuń do listy rezerwacji. 
- [x] Wykorzystanie klasy ReservationRepository – dopisanie metody usuwającej rezerwację z bazy danych. 
- [x] Podpięcie akcji usunięcia rezerwacji pod przycisk.
- [x] Utworzyć w bazie danych tabelę user.
- [x] Utworzyć nowe podstrony z formularzami: rejestracji, logowania (nickname, email, haslo) - na tym etapie jeszcze bez logiki backendowej. 
- [x] Dodać w menu Logowanie i Rejestracja

## Lesson 6

Zadania: 
- [x] Utworzyć klasę Reservation. 
- [x] Utworzyć tabelę reservation w bazie danych (dodać Foreign Key na kolumnie room_id, upewnić się, że istnieje kolumna id w tabeli Room i ma zdefiniowany primary_key). 
- [x] Dodać w klasie ReservationRepository metody: zapisu do/ odczytu z bazy danych (jeśli jeszcze ich nie ma). 
- [x] Wypisać listę rezerwacji z bazy danych poniżej listingu rezerwacji odczytywanych z pliku. 
- [x] Przy każdej rezerwacji na listingu wyświetlić nazwę sali, dla której jest zrobiona rezerwacja (umożliwia to relacja między tablami reservation i room) 
- [x] *Zapis do pliku rezerwacji .csv, .json, .xml
- [x] *Użycie wzorców: Strategia i Fabryka

*Strategia posłuży w tym projekcie do wyboru, czy rezerwacja ma się zapisywać w pliku CSV, Json, XML, czy w bazie danych.
Strategia umożliwi utworzenie jednej klasy (np. ReservationService), która będzie tworzyć nową rezerwację, niezależnie od tego, czy ma ją zapisać w bazie danych, czy w jednym z plików. Klasa ta nie będzie wiedziała, gdzie ma zapisywać dane. 
Użytkownik aplikacji będzie decydować w jakim źródle chce zapisać rezerwację. Można to zrealizować np. w taki sposób:
w formularzu dodawania rezerwacji pojawią się 4 przyciski do wyboru
(Zapisz w bazie danych, Zapisz w pliku CSV, Zapisz w pliku JSON, Zapisz w pliku XML)

## Lesson 5

Zadania: 
- [x] Dodanie autoloadingu (autoloading.php) 
- [x] Rozmieszczenie plików w katalogach (Reservation [Model, Service, Repository], Room [Model, Service, Repository], System [File, Database], Controller, View, layout, Form) 
- [x] Utworzyć plik .php z formularzem dodawania sal. 
- [x] Dodać w menu Dodaj Salę z linkiem do formularza dodawania sal. 
- [x] Utworzyć klasę RoomService i Room.
- [x] Utworzyć gettery i settery dla pól odwzorowujących kolumny w bazie danych. 
- [x] Zapisywanie danych encji klasy Room w bazie danych. 
- [x] Utworzenie dla każdej klasy poprawnego namespace-a

Menu powinno znaleźć się w katalogu layout i powinno być wyświetlane we wszystkich widokach i formulrzach.
Do katalagu Controller wrzucić akcje, czyli w tym wypadku
plik, do którego jest przekierowanie z formularza dodawania rezerwacji oraz
plik, do którego jest przekierowanie z formularza dodawania sali.
Do widoków (View) wrzucamy pliki odpowiedzialne za wyświetlanie danych otrzymanych z backendu, w tym wszystkie listingi. Style powinny się znaleźć w oddzielnych plikach css w katalogu layout\css


## Lesson 4

Zadania: 
- [x] Utworzenie klasy Connection, która będzie miała metodę tworzącą połączenie z bazą danych 
   - klasa ta ma być Singleton-em 
   - połącznie z bazą danych przez PDO 
- [x] Utworzenie tabeli room i wprowadzenie wartości do bazy danych (insert z konsoli PhpStorm) 
- [x] Zastąpić dane w listingu sal, do tej pory pobieranych z pliku .xml, danymi z bazy danych 
- [x] *Ćwiczenia z SQL (select, insert, update, delete)

## Lesson 3

Zadania: 
- [x] Zrobić menu z użyciem Bootstrapa (karty: Home - prowadzi do listingu sal, Wszystkie Rezerwacje)
- [x] Zastąpić dane na sztywno wypisane w listingu sal, danymi z pliku xml - utworzyć plik xml z danymi do listingu sal - użyć PHP do pobierania danych z pliku - wyświelić dane w formie tabeli 
- [x] Utworzyć plik json z danymi do listingu sal i wyświetlić analogicznie do poprzedniego punktu

## Lesson 2

W tym dniu po raz pierwszy będzie trzeba użyć PHP 
- [x] Akcja na przyciskach Zarezerwuj listingu sal (GET) 
   - zastąpienie pliku .html z listingiem sal plikiem .php 
   - zastąpienie pliku .html z formularzem rezerwacji plikiem .php 
   - po kliknięciu na przycisk Zarezerwuj przekierowanie do pliku z formularzem rezerwacji 
   - przesłanie parameterem w requeście nazwy sali 
   - wyświetlenie nazwy sali nad formularzem rezerwacji 
- [x] Akcja na przycisku submit formularzu dodawania rezerwacji (POST) 
   - utworzenie klasy (ReservationService), która obsłuży dodawanie rezerwacji, zapisanie danych wysłanych formularzem do pliku .csv (użyć SplFileObject) 
   - przekierowanie do listingu rezerwacji 
   - zastąpienie pliku .html z listingiem rezerwacji plikiem .php 
   - *wyświetlenie komunikatu, o powodzeniu lub niepowodzieniu operacji dodania do pliku 
- [x] Odczyt z pliku: listing rezerwacji od teraz pobiera dane z pliku .csv. Utworzenie klasy, która obsłuży pobieranie rezerwacji


## Lesson 1

Zadania:
- [x] Stworzyć listę sal z użyciem HTML + CSS + Bootstrap
  - najlepiej wykorzystać do tego tabelę 
  - przy każdej sali przycisk Zarezerwuj - dane: rooms.txt 
  - kliknięcie przycisku Zarezerwuj ma powodować przeniesienie na stronię z formmularzem rezerwacji (który będzie utworzony w następnym podpunkcie)
- [x] Utworzenie pliku html z formularzem rezerwacji. Formularz ma się składać z następujących pól: 
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
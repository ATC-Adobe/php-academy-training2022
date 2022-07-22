### Xdebug
- port: 9009
- ssh port: 12000
- remote project files path `/var/www/php`
- xdebug tunnel: `ssh -R 9009:127.0.0.1:9009 xdebug@localwsl.com -p 12000`
- ssh xdebug password (for tunnel): `xdebug`

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
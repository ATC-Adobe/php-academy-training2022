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

Teoria: - Podstawy programowania obiektowego: - Klasy abstrakcyjne - Interfejsy - Dziedziczenie - Enkapsulacja - Polimorfizm - Metody HTTP: GET, POST

Materiały: - PHP OOP: - Rozdziały 6 i 7 z: https://accenture.percipio.com/books/a9273992-505f-4aa5-a306-5ac87e672f05 - https://www.w3schools.com/php/ - Metody http: - https://www.w3schools.com/tags/ref_httpmethods.asp - http://www.steves-internet-guide.com/http-basics/
- SPL: - https://www.php.net/manual/en/class.splfileobject.php - https://www.php.net/manual/en/function.fopen.php - https://www.php.net/manual/en/splfileobject.fread.php - https://www.php.net/manual/en/splfileobject.fwrite.php - https://www.php.net/manual/en/splfileobject.fputcsv.php - https://www.php.net/manual/en/splfileobject.fgetcsv.php

W tym dniu po raz pierwszy będzie trzeba użyć PHP 1. Akcja na przyciskach Zarezerwuj listingu sal (GET) - zastąpienie pliku .html z listingiem sal plikiem .php - zastąpienie pliku .html z formularzem rezerwacji plikiem .php - po kliknięciu na przycisk Zarezerwuj przekierowanie do pliku z formularzem rezerwacji - przesłanie parameterem w requeście nazwy sali - wyświetlenie nazwy sali nad formularzem rezerwacji 2. Akcja na przycisku submit formularzu dodawania rezerwacji (POST) - utworzenie klasy (ReservationService), która obsłuży dodawanie rezerwacji, zapisanie danych wysłanych formularzem do pliku .csv (użyć SplFileObject) - przekierowanie do listingu rezerwacji - zastąpienie pliku .html z listingiem rezerwacji plikiem .php - *wyświetlenie komunikatu, o powodzeniu lub niepowodzieniu operacji dodania do pliku 3. Odczyt z pliku: listing rezerwacji od teraz pobiera dane z pliku .csv. Utworzenie klasy, która obsłuży pobieranie rezerwacji

=================

Do zapoznania się kolejno: 1. Koncepcja Walking skeleton * https://codeclimate.com/blog/kickstart-your-next-project-with-a-walking-skeleton/ * https://www.swiatprzywodztwa.pl/walking-skeleton-zwinne-realizowanie-projektow/ 2. Podstawy HTML * Informacje ogólne - https://www.w3schools.com/html/default.asp - https://accenture.percipio.com/books/ce87ebc7-f0cc-4749-bcc2-afa18b479df3 - Rozdziały I i II * Formularze - http://how2html.pl/form-html/ 3. CSS/Bootstrap * Podstawy CSS - https://www.w3schools.com/css/css_intro.asp * Bootstrap - https://getbootstrap.com/docs/4.4/getting-started/introduction/

Zadania: 1. Stworzyć listę sal z użyciem HTML + CSS + Bootstrap
- najlepiej wykorzystać do tego tabelę - przy każdej sali przycisk Zarezerwuj - dane: rooms.txt - kliknięcie przycisku Zarezerwuj ma powodować przeniesienie na stronię z formmularzem rezerwacji (który będzie utworzony w następnym podpunkcie) 2. Utworzenie pliku html z formularzem rezerwacji. Formularz ma się składać z następujących pól: - imię - nazwsko - adres e-mail - od (data i godzina rozpoczęcia razerwacji) - do (data i godzina zakończenia razerwacji) - przycisk Zapisz - Kliknięcie przycisku Zapisz przekierowuje na stronę z listą rezerwacji (która będzie utworzona w kolejnym punkcie)

Style z Bootstrap-a, ewentualnie CSS
Stworzyć listę rezerwacji z użyciem HTML + CSS + Bootstrap
Przykładowe dane: reservations.txt
Wszystkie strony powinny posiadać przynajmniej podstawowe ostylowanie - Bootstrap-a i/lub czysty CSS.
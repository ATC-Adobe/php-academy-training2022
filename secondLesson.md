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
    - Rozdziały 6 i 7 z: https://accenture.percipio.com/books/a9273992-505f-4aa5-a306-5ac87e672f05
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

W tym dniu po raz pierwszy będzie trzeba użyć **PHP**
1. Akcja na przyciskach `Zarezerwuj` listingu sal (**GET**)
    - zastąpienie pliku `.html` z listingiem sal plikiem `.php`
    - zastąpienie pliku `.html` z formularzem rezerwacji plikiem `.php`
    - po kliknięciu na przycisk `Zarezerwuj` przekierowanie do pliku z formularzem rezerwacji
    - przesłanie parameterem w requeście nazwy sali
    - wyświetlenie nazwy sali nad formularzem rezerwacji
2. Akcja na przycisku `submit` formularzu dodawania rezerwacji (**POST**)
    - utworzenie klasy (`ReservationService`), która obsłuży dodawanie rezerwacji, zapisanie danych wysłanych formularzem do pliku `.csv` (użyć SplFileObject)
    - przekierowanie do listingu rezerwacji
    - zastąpienie pliku `.html` z listingiem rezerwacji plikiem `.php`
    - *wyświetlenie komunikatu, o powodzeniu lub niepowodzieniu operacji dodania do pliku
3. Odczyt z pliku: listing rezerwacji od teraz pobiera dane z pliku `.csv`. Utworzenie klasy, która obsłuży pobieranie rezerwacji

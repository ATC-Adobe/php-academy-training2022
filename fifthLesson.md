Teoria: Autoloading, Encje

Materiały:
1. Autoloading
    * dokumentacja php: https://www.php.net/manual/en/language.oop5.autoload.php
    * aktualny standard:  https://www.php-fig.org/psr/psr-4/examples/
    * blog: https://jkalasz.pl/aplikacje/autoloading-w-php-czyli-jak-dziala-composer/
2. Encje
    * ``` An entity is the real world object that is represented in database ```
    * Definicja encji z Doctrine: https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html#what-are-entities
    * https://en.wikipedia.org/wiki/Mutator_method
3. Quality Tools
    * Code Sniffer: https://github.com/squizlabs/PHP_CodeSniffer
    * Mess Detector: https://phpmd.org/download/index.html
    * CS Fixer https://github.com/FriendsOfPHP/PHP-CS-Fixer

Zadania:
1. Dodanie autoloadingu (autoloading.php)
2. Rozmieszczenie plików w katalogach (Reservation [Model, Service, Repository], Room [Model, Service, Repository], System [File, Database], Controller, View, layout, Form) 
3. Utworzyć plik `.php` z formularzem dodawania sal.
4. Dodać w menu `Dodaj Salę` z linkiem do formularza dodawania sal.
5. Utworzyć klasę `RoomService` i `Room`.  
6. Utworzyć gettery i settery dla pól odwzorowujących kolumny w `bazie danych`. 
7. Zapisywanie danych encji klasy `Room` w `bazie danych`.
8. Utworzenie dla każdej klasy poprawnego namespace-a


Menu powinno znaleźć się w katalogu `layout` i powinno być wyświetlane we wszystkich widokach i formulrzach.  
Do katalagu `Controller` wrzucić akcje, czyli w tym wypadku  
plik, do którego jest przekierowanie z formularza dodawania rezerwacji oraz  
plik, do którego jest przekierowanie z formularza dodawania sali.  
Do widoków (`View`) wrzucamy pliki odpowiedzialne za wyświetlanie danych otrzymanych z backendu, w tym wszystkie listingi.
Style powinny się znaleźć w oddzielnych plikach css w katalogu `layout\css`    
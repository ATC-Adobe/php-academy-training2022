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
1. Utworzyć klasę `Reservation`.
2. Utworzyć tabelę `reservation` w `bazie danych` (dodać `Foreign Key` na kolumnie `room_id`, upewnić się, 
że istnieje kolumna `id` w tabeli `Room` i ma zdefiniowany `primary_key`).
3. Dodać w klasie `ReservationRepository` metody: zapisu do/ odczytu z `bazy danych` (jeśli jeszcze ich nie ma).
4. Wypisać listę rezerwacji z `bazy danych` poniżej listingu rezerwacji odczytywanych z pliku.
5. Przy każdej rezerwacji na listingu wyświetlić nazwę sali, dla której jest zrobiona rezerwacja
 (umożliwia to relacja między tablami `reservation` i `room`) 
5. *Zapis do pliku rezerwacji `.csv`, `.json`, `.xml`   
6. *Użycie wzorców: Strategia i Fabryka

*Strategia posłuży w tym projekcie do wyboru, czy rezerwacja ma się zapisywać w pliku `CSV`, `Json`, `XML`, czy w `bazie danych`.  
Strategia umożliwi utworzenie jednej klasy (np. `ReservationService`), która będzie tworzyć nową rezerwację, niezależnie od tego, 
czy ma ją zapisać w bazie danych, czy w jednym z plików. Klasa ta nie będzie wiedziała, gdzie ma zapisywać dane.
Użytkownik aplikacji będzie decydować w jakim źródle chce zapisać rezerwację.
Można to zrealizować np. w taki sposób:  
w formularzu dodawania rezerwacji pojawią się 4 przyciski do wyboru  
(`Zapisz w bazie danych`, `Zapisz w pliku CSV`, `Zapisz w pliku JSON`, `Zapisz w pliku XML`)

Teoria:
    - Wzorzec projektowy: Singleton 
    - Składnia SQL
    - Wprowadzenie do połączenia z bazą danych
        - Podpięcie bazy danych do PHPStorma
    - PDO

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
1. Utworzenie klasy `Connection`, która będzie miała metodę tworzącą połączenie z `bazą danych`
    - klasa ta ma być Singleton-em
    - połącznie z bazą danych przez PDO
2. Utworzenie tabeli `room` i wprowadzenie wartości  do bazy danych (insert z konsoli PhpStorm) 
3. Zastąpić dane w listingu sal, do tej pory pobieranych z pliku `.xml`, danymi z `bazy danych`
4. *Ćwiczenia z SQL (select, insert, update, delete)  

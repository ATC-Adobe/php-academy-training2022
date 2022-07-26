Materiały:
- GraphQl:
	- https://bykowski.pl/nowy-nastepca-rest-poznaj-graphql/
	- https://www.moesif.com/blog/technical/graphql/REST-vs-GraphQL-APIs-the-good-the-bad-the-ugly/
- GraphQl API w PHP:
	- https://webkul.com/blog/how-to-use-graphql-in-php/
	
Instalacja Composera:
1. Przejdź do folderu 	`cd ~`
2. Pobierz pakiet composera `curl https://getcomposer.org/installer -o composer-setup.php`
3. Zainstaluj Composer `php composer-setup.php --install-dir = / usr / local / bin --filename = composer`
4. Zaktualizuj Composer `composer self-update`
5. Przygotuj swój projekt:
	1. Uruchom komendę `composer init`
	2. Package name `php/academy'
	3. Author `imie i nazwisko`
	4. Minimum stability -> Enter
	5. Package Type -> Enter
	6. License -> Enter
	7. Would you like to define your dependencies (require) interactively [yes]? -> No
	8. Would you like to define your dev dependencies (require-dev) interactively [yes]? -> No
	9. Add PSR-4 autoload mapping? Maps namespace "Php\Academy" to the entered relative path. [src/, n to skip] -> No
	10. Do you confirm generation [yes]? -> Yes
6. W pliku composer.json dodaj sekcję 
	'"autoload": {
              "psr-0": {
            "": [
                "src/"
            ]
        }
    }'
7. Uruchom komendę `composer install'
8. Możesz usunąć swój plik autoloader.php i odwołania do niego. Od tej chwili będzie używany autoloader z composera.

Zadania:
1. Instalacja Composera.
2. W pliku `composer.json` należy dodać bibliotekę `webonyx/graphql-php` w najnowszej wersji. Pomyślcie jak sprawić, by composer pobrał tę bibliotekę.
3. Przygotować API, które będzie wykonywało podobne operacje do tych, które zostały utworzone przy pomocy REST API. Lista akcji:
	- zwracanie listy wszystkich rezerwacji (id rezerwacji, id salki, id usera, daty)
	- zwracanie listy rezerwacji, które są aktualne (późniejsze niż obecny czas)
	- zwracanie rezerwacji danego usera 
	- tworzenie nowej rezerwacji dla danego usera ( tak jak w Lekcji 9 - sprawdzanie czy istnieje user i salka, sprawdzenie czy `od` < `do`, sprawdzanie czy `od` jest późnijsze niż `teraz`)
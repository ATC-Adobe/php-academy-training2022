Materiały:
- PHPUnit
	- http://itcraftsman.pl/tdd-w-php-testy-jednostkowe-z-phpunit-krok-po-kroku/
	- https://www.freecodecamp.org/news/test-php-code-with-phpunit/
	- https://phpunit.readthedocs.io/en/9.5/
	
Zadania:
1. Za pomocą Composera zainstalować bibliotekę `phpunit/phpunit` w wersji ^9.5
2. W głównym katalogu projektu utworzyć katalog Test a w nim folder Unit. W tym folderze będziecie tworzyć kolejne podfoldery, którę mają odzwierciedlać ścieżkę do testowanej klasy, np. test dla klasy `Reservation/Model.php` będzie się znajdował w klasie `Test/Unit/Reservation/ModelTest.php`.
3. Utworzyć pierwszą klasę Test.php, w której będziecie pisać pierwsze testy i asercje. Napiszcie 5 różnych testów, które będą sprawdzały różnego rodzaju asercje np. `assertTrue`, `assertEquals`. W dokumentacji znajdźcie asercje innego rodzaju.
4. W projekcie utworzyć klasę `Calculate.php`, która będzie zawierała metodę `calculate`. Metoda ta ma przyjmować dwa argumenty typu `int` (składniki działania) oraz jeden argument typu `string` (typ działania: `+`,`-`,`*`). Metoda ma zwracać wynik typu `int` (jak można do zdefiniować w PHP?). Utwórzcie odpowiednią klasę w folderze z testami.
Do przekazywania danych do metody testującej użyjcie DataProvider, który dla każdego typu działania ma testować jedno poprawne i jedno błędne założenie (true/false).
5. Utwórzcie nową klasę z odpowiednią ścieżką, która będzie testowała metodę sprawdzającą czy data rezerwacji salki spełnia kryteria (`od` < `do`, `od` > `teraz`). Zastanówcie się czy nie trzeba dokonać refaktoryzacji kodu, aby można było napisać taki test.
6. Napisać testy, które sprawdzają czy rezultat zwracany z metod API jest poprawny z założonym wynikiem w teście. Należy użyć obiektów Mock i danych testowych. **Testy jednostkowe nie mogą pobierać danych z bazy**. Napiszcie testy dla metod 
	- zwracanie listy wszystkich salek (id rezerwacji, id salki, id usera, daty)
	- zwracanie listy rezerwacji, które są aktualne (późniejsze niż obecny czas)	
	- zwracanie rezerwacji danego usera

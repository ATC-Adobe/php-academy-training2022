Materiały:
- Debugowanie:
	- https://pl.wikipedia.org/wiki/Debugowanie
	- https://www.techtarget.com/searchsoftwarequality/definition/debugging
	- https://www.freecodecamp.org/news/what-is-debugging-how-to-debug-code/
	- https://stackoverflow.com/questions/25385173/what-is-a-debugger-and-how-can-it-help-me-diagnose-problems
- Xdebug:
	- https://www.jetbrains.com/help/phpstorm/configuring-xdebug.html
	- https://www.jetbrains.com/help/phpstorm/browser-debugging-extensions.html
	- https://www.jetbrains.com/help/phpstorm/using-breakpoints.html#set-breakpoints
	- https://www.jetbrains.com/help/phpstorm/run-debug-configuration.html#create-permanent
	- https://www.jetbrains.com/help/phpstorm/debug-tool-window.html
	- https://www.jetbrains.com/help/phpstorm/examining-suspended-program.html
	
Zadania:
1. Skonfiguruj połącznie z Xdebug w PhpStorm.
2. Utwórz nową stronę w aplikacji, która będzie wyświetlała wynik dodawania dwóch zmiennych 
```   
    $a = 5;
    $b = 10;
    $c = $a + $b;
    
    echo 'Wynik obliczeń to: ' . $c . '<br>';    
```
3. W PHPStorm włącz nasłuch Xdebug i ustaw breakpoint w lini, w której jest wykonywane działanie. Otwórz stronę, na której będzie wyświetlany wynik. Podejrzyj wartości zmiennych. Zapoznaj się z akcjami/przyciskami, które są dostępne z poziomu debbugera. Kliknij "Reasume program" by wykonać dalszą część akcji.
4. Wywołaj stronę jeszcze raz, tym razem za pomocą Xdebug zmień wartość zmiennej `$a`. Puść program dalej. Sprawdź jaki wynik został wyświetlony teraz.
5. Napisz nową metodę, która będzie zawierała deklarację zmiennych `$a` i `$b` oraz będzie zwracała wynik dodawania tych dwóch liczb. W obecnej metodzie do zmiennej `$c` przypisz wynik wywołania tej metody. Ustaw breakpoint w tej lini. Wynik działania metody możesz sprawdzić z poziomu debuggera za pomocą akcji `Evaluate Expression`.
6. Odśwież stronę, jednak tym raz zamiast opcji `Evaluate` wybierz opcję `Step into`. Zobacz jak teraz zachowuje się debugger.
7. Napisz prostą tablicę asocjacyjną, w której do każdego dnia tygodnia (klucz) będzie przypisane jego tłumaczenie w języku angielskim. Tablicę wyświetl przy użyciu pętli `foreach`. Ustaw breakpoint w lini, gdzie zdefiniowana jest tablica, a następnie klikaj przycisk "Step Over". Wykonuj tę akcję aż do zakończenia wyjścia z pętli.
8. Ośwież stronę, lecz tym razem zmień wartość przypisaną do klucza `środa` z języka anglieskiego na język niemiecki.
9. W kolejnym podejściu ustaw breakpoint w pętli w miejscu gdzie wyświetlana jest wartość danego klucza. Klikając PPM na breakpoint możesz ustawić warunek, kiedy działanie programu ma się zatrzymać. Napisz warunek by działanie programu zatrzymało się przy wyświetlaniu wartości klucza `piątek`. Odśwież stronę.
10. Ustaw breakpoint w metodzie, która sprawdza poprawność danych z formularza do rezerwacji salek. Z poziomu Xdebug zmieniaj pojedyncze dane wejściowe (zmień wartość `od`, zmień wartość `do`, itp.), puść wykonywanie programu dalej i zobacz co wyświetli przeglądarka.
11. Przetestuj działanie Xdebuga w innych miejscach.
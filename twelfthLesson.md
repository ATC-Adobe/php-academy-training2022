Materiały:
- REST API:
	- https://bykowski.pl/rest-api-efektywna-droga-do-zrozumienia/
	- https://phpenthusiast.com/blog/what-is-rest-api
	
- Postman:
	- https://learning.postman.com/docs/getting-started/introduction/
		
- REST API w PHP:
	- https://www.positronx.io/create-simple-php-crud-rest-api-with-mysql-php-pdo/#tc_9820_03
	- https://dev.to/shahbaz17/build-a-simple-rest-api-in-php-2edl
	- https://www.phpzag.com/how-to-create-simple-rest-api-in-php/

Zadania:	
1. Instalacja Postman i pierwsze kroki
	- Pobierz program Postman ze strony https://www.postman.com/downloads/ i zainstaluj go.
	- Dodaj nowe zapytanie do Postmana. W miejsce URL wklej adres https://reqres.in/api/users?page=2, wybierz metodę GET i kliknij "Send". Przeanalizuj zwrócony wynik. 
	- W kolejnym zapytaniu użyj URL https://reqres.in/api/users/2. Zastanów się jak pobrać dane dla innego usera o innym ID.
	- W następnym kroku pobierz dane usera o ID=15. Zobacz jakie dane zostały zwrócone. Zwróć uwagę na kod HTTP.
2. Zaimplementuj metody REST API, które wykonają poniższe rzeczy:
	- zwracanie listy wszystkich salek (id rezerwacji, id salki, id usera, daty)
	- zwracanie listy rezerwacji, które są aktualne (późniejsze niż obecny czas)
	- zwracanie rezerwacji danego usera 
	- tworzenie nowej rezerwacji dla danego usera ( tak jak w Lekcji 9 - sprawdzanie czy istnieje user i salka, sprawdzenie czy `od` < `do`, sprawdzanie czy `od` jest późnijsze niż `teraz`). W przypadku gdy dane są błędne, to zwrócić odpowiedni komunikat. Gdy rezerwacja się uda, to zwrócić id usera, id rezerwacji, id salki, czas rezerwacji
	- dodanie autentykacji do API, od teraz przy API do tworzenia nowej rezerwacji wymagane będzie podanie loginu i hasła usera (zastanówcie się jak ustawić taką autoryzację w Postmanie). W przypadku gdy dane są błędne zwrócić odpowiedź `Brak dostępu do API`. Całość musi opierać się o progamowanie obiektowe, a API ma zwracać dane w formacie JSON. Pamiętajcie o odpowiedniej strukturze katalogów.

Ważne jest przygotowanie odpowiedniego routera (metody), który na podstawie metody REST API będzie przekierowywał akcję do odpowiednich metod.
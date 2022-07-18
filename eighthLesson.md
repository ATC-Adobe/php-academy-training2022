Teoria: Wprowadzenie do działania mechanizmu sesji w PHP.

Materiały:
- Mechanizm sesji w PHP
	- https://www.php.net/manual/en/features.sessions.php
	- https://www.php.net/manual/en/book.session.php
		Przejrzyjce zwłaszcza:
		- session_start() - ze zwróceniem uwagi, gdzie u was w kodzie powinno sie znaleźć
		- session_id() 
		- session_destroy()
		- session_unset()
		- session_write_close() / session_commit()
		
	- W skrócie: https://www.guru99.com/cookies-and-sessions.html
		
	- Session ID - https://stackoverflow.com/questions/1370951/what-is-phpsessid
		- Rzućcie okiem tutaj na wiki, ale nie zagłębiajcie się zbyt mocno (security)* 
			- https://en.wikipedia.org/wiki/Session_fixation
			- https://en.wikipedia.org/wiki/Session_fixation#Regenerate_SID_on_each_request
			Jak ktoś zaimplementuje nowy SID na każdym requeście to ukradnę dla Niej/Niego cukierki z recepcji ;p
			Oczywiście dane w sesji nie mogą być przy tym "gubione"
				
		
- Tablica superglobalna $_SESSION, z niej odczytujecie / zapisujecie dane
	- https://www.php.net/manual/en/reserved.variables.session.php
	
- Komunikaty / Alerty
	- https://getbootstrap.com/docs/4.0/components/alerts/
	- https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-alerts.php 
	- https://www.quackit.com/bootstrap/bootstrap_4/tutorial/bootstrap_alerts.cfm
	(dodatkowe plusy w moich oczach za kreatywność :D)
	
Zadania:
1. Dodać link w menu `Wyloguj` (przed/za `Logowanie` i `Rejestracja`)
2. "Kontrolery" dla logowania i rejestracji `User`a + model i repozytorium dla `User`a
	- zanim ruszycie z modelem Usera, przemyślcie jakie ma posiadać właściwości(prioperties) 
	Tj. co dodać do tabeli user i formularza rejestracji, użycie przy okazji "ALTER TABLE xyz ADD ..." (column) mile widziane
3. Utworzenie klasy `Authenticator` (
		metody: 
		- login(string $username, string $password) - co będzie zwracać? jak zapiszecie informacje, ze User jest zalogowany? - pytania do Was 
		- register(string $username, string $password1, string $password2, string $email, itp...) - co będzie zwracać? 
		- logout()
		+ inwencja twórcza
	).
4. Zapisywanie w sesji informacji, czy user jest zalogowany 
	- Bazując na tej informacji edytować menu, tak aby wyświetlało `Logowanie` i `Rejestracja` lub `Wyloguj`
	- a może jeszcze wyświetlanie jakiegoś "Cześć $firstname !" w menu?
5. Wprowadzenie mechanizmu walidacji, wyświetlanie komunikatów (w oparciu o sesje i np. alerty z bootstrapa)
	- np. Div message-box w headerze podstron, ktory pojawia się, gdy jest jakiś message w sesji
	- walidacja logowania i rejestracji(np. dlugosc hasel, wymagane znaki, czy user/email już istnieje w bazie itd itp) 
		Po stronie frontendu - np. wymagana min dlugosc hasla itp i rownież na backendzie
	- informacja o wylogowaniu

6. Refactor tj. 
	- Pozbycie sie wszędzie bezpośrednich odwołań do $_SESSION
		utworzenie klasy Session (podpowiedz - zastanowić się jakiego "typu" może/powinna być ta klasa, conajmniej jedną taką pisaliście)
	 	metody: get, set, create, destroy, ...
	- Co jeśli ktoś wykradłby naszą baze z loginami i hasłami użytkowników? *
		- jak zabezpieczyć się przed taka sytuacją? - poczytać o haszowaniu haseł i "soli" *
		- przerobić kolumne password w tabeli user, pod hash np. dlugości 64 *
		- dodać prywatna metodę w klasie `Authenticator`, która będzie haszować "plain" password i użyć jej w metodach logIn i register *
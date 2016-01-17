

<?php

class baza extends controller 
{

    protected $layout ;
    protected $model ;

/**
  * Konstruktor obiektu klasy baza
  */

    function __construct() {
       parent::__construct() ;
       $this->layout = new view('main') ;
       $this->layout->css = $this->css ;
       $this->layout->title  = 'Baza danych PostgreSQL' ;
       $this->layout->menu = $this->menu ;
       $this->model  = new model2 ;



    }


/**
  * Funkcja odpowiedzialna za wyświetlanie histori wypożyczeń pobranych za pomocą metody listAll() z pliku model2.php
  */
   function listAll() {

$this->layout->tytul  = 'Historia wypożyczeń' ;
       $this->layout->header = 'Historia wypożyczeń' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->listAll() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za wyświetlanie raportów pobranych za pomocą metody raport() z pliku model2.php
  */

    function raport() {

$this->layout->tytul  = 'Raporty' ;
       $this->layout->header = 'Raporty' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->raport() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych nowego oddziału
  */
    function dodaj_oddzial() {

$this->layout->tytul  = 'Dodaj oddział' ;
       $this->layout->header = 'Dodaj oddział' ;
       $this->view = new view('dodaj_oddzial') ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych poszukiwanego auta
  */
    function szukaj_auta() {

$this->layout->tytul  = 'Szukaj auta' ;
       $this->layout->header = 'Szukaj auta' ;
       $this->view = new view('szukaj_auta') ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych usuwanego auta
  */
    function usun_wypozyczenie()

 {

$this->layout->tytul  = 'Usuń wypożyczenie' ;
       $this->layout->header = 'Usuń wypożyczenie' ;
       $this->view = new view('usun_wypozyczenie') ;
$this->view->wypozyczenia = new view('listAll');
       $this->view->wypozyczenia->data = $this->model->listAllwypoDesc() ;
/*
           $this->view->data = $this->model->szukaj_wypo($obj) ;
$this->view->wypoz = new view('listAllcars');
$this->view->wypoz->data = $this->view->data;

*/
$this->layout->content = $this->view ; 

       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji usun_wypozyczenie_js($obj) z pliku model2
  */
function usun_wypozyczenie_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

 	    if ( !empty($obj->idwypozyczenia) ) {    
            $response = $this->model->usun_wypozyczenie_js($obj) ;
       }
       return ( $response ? "Usunięto rekord z bazy wypożyczeń" : "Złe dane " ) ;

    }

/**
  * Funkcja odpowiedzialna za wyświetlanie listy oddziałów pobranej z bazy danych metodą oddzial() z pliku model2
  */
    function oddzial() {

$this->layout->tytul  = 'Oddziały firmy' ;
       $this->layout->header = 'Oddziały fimy' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->oddzial() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za wyświetlanie aktualnej listy aut oraz formularza do wpisania danych nowego auta
  */
    function dodaj_auto() {

$this->layout->tytul  = 'Dodaj auto' ;
       $this->layout->header = 'Dodaj auto' ;
       $this->view = new view('dodaj_auto') ;
	$this->view->auta = new view('listAll') ;
       $this->view->auta->data = $this->model->listAllcarstf() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za wyświetlanie aktualnej listy aut oraz formularza do wpisania danych nowego modelu auta
  */
    function dodaj_model_auta() {

$this->layout->tytul  = 'Dodaj model auta' ;
       $this->layout->header = 'Dodaj model auta' ;
       $this->view = new view('dodaj_model_auta') ;
	$this->view->auta = new view('listAll') ;
       $this->view->auta->data = $this->model->listAllmodel() ;
$this->view->modele = new view('listAll') ;

       $this->layout->content = $this->view ; 
       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji dodaj_model_auta_js($obj) z pliku model2 w celu dodania nowego modelu auta do tabeli modeli aut w bazie danych
  */
function dodaj_model_auta_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

 	    if ( !empty($obj->model) and !empty($obj->marka) ) {    
            $response = $this->model->dodaj_model_auta_js($obj) ;
       }
       return ( $response ? "Dodano rekord do bazy modeli" : "Złe dane / Taki model już istnieje " ) ;

    }

/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji dodaj_auto_js($obj) z pliku model2 w celu dodania nowego rekordu do tabeli aut w bazie danych
  */
function dodaj_auto_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

 	    if ( !empty($obj->marka) and !empty($obj->typ) and !empty($obj->moc) and !empty($obj->miejsca) and !empty($obj->bagaznik) and !empty($obj->cena_dzien) and !empty($obj->oddzial) ) {    
            $response = $this->model->dodaj_auto_js($obj) ;
       }
       return ( $response ? "Dodano rekord do bazy aut" : "Złe dane " ) ;

    }



/**
  * Funkcja odpowiedzialna za wyświetlanie aktualnej listy aut oraz formularza do wpisania danych usuwanego auta
  */
    function usun_auto() {

$this->layout->tytul  = 'Usuń auto' ;
       $this->layout->header = 'Usuń auto' ;
       $this->view = new view('usun_auto') ;
	$this->view->auta = new view('listAll') ;
       $this->view->auta->data = $this->model->listAllcarstf() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji usun_auto_js($obj) z pliku model2 w celu usunięcia auta o danym ID
  */
function usun_auto_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

       if (isset($obj->idauta)  ) {    
            $response = $this->model->usun_auto_js($obj) ;
       }
       return ( $response ? "Auto usunięte" : "Nie ma auta o takim ID " ) ;

    }


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wybór daty z której wyświetlona zostanie historia wypożyczeń
  */
    function znajdz_wypo() {


$this->layout->tytul  = 'Historia wypożyczeń z danego okresu' ;
 $this->layout->header = 'Historia wypożyczeń z danego okresu' ;
 	$this->view= new view('znajdz_wypo');


$this->layout->content = $this->view ; 

       return $this->layout ;
    }



/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji szukaj_wypo($obj) z pliku model2 w celu wyszukania wypożyczenia z danego okresu
  */
function szukaj_wypo() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

$this->view = new view('listAll') ;

          $this->view->data = $this->model->szukaj_wypo($obj) ;
$this->layout->content = $this->view ; 
$this->layout = $this->view;
  return $this->layout;

    }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę napraw auta o podanym id
  */
function hist_auta_naprawa(){

	$data = $_POST['data'];
	$obj = json_decode($data);

	$this->view = new view('listAll');
	$this->view->data = $this->model->hist_auta_naprawa($obj);
	$this->view->auta = new view('listAll');
	$this->view->auta->data = $this->model->listAllcarstf();

	$this->layout->content = $this->view;
	$this->layout = $this->view;
	return $this->layout;

}





/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wybór id auta którego historia wypożyczeń zostanie wyświetlona
  */
function historia_auta() {

$this->layout->tytul  = 'Historia wypożyczeń auta' ;
 $this->layout->header = 'Historia wypożyczeń auta' ;
 	$this->view= new view('historia_auta');
$this->view->auta = new view('listAll');
       $this->view->auta->data = $this->model->listAllcarstf() ;

$this->layout->content = $this->view ; 

       return $this->layout ;
    }

/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji hist_auta_wypo($obj) z pliku model2 w celu wczytania z bazy danych historii wypożyczeń auta o danym id
  */
function hist_auta_wypo() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;



 	$this->view= new view('listAll');
        $this->view->data = $this->model->hist_auta_wypo($obj);
$this->view->auta= new view('listAll');
        $this->view->auta->data = $this->model->listAllcarstf() ;

$this->layout->content = $this->view; 
$this->layout = $this->view;
  return $this->layout;

    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji szukaj_auto_js($obj) z pliku model2 w celu wyszukania auta o podanych parametrach
  */
function szukaj_auto_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;
 	$this->view= new view('listAll');
        $this->view->data = $this->model->szukaj_auto_js($obj);

$this->layout->content = $this->view; 
$this->layout = $this->view;

  return $this->layout;



    }



/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wybór id auta którego historie chcemy wyświetlić oraz wyświetlanie tabeli aut
  */
function historia_auta_naprawa() {

$this->layout->tytul  = 'Historia napraw' ;
 $this->layout->header = 'Historia napraw auta' ;
 	$this->view= new view('historia_auta_naprawa');
$this->view->auta = new view('listAll');
       $this->view->auta->data = $this->model->listAllcarstf() ;

$this->layout->content = $this->view ; 

       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wybór id auta które chcemy zwrócić  wyświetlanie tabeli aut aktualnie wypożyczonych
  */
function zwrot() {
      

$this->layout->tytul  = 'Zwróć auto' ;
 $this->layout->header = 'Zwróć auto' ;
 	$this->view= new view('zwrot_auta');
$this->view->auta = new view('listAll');
       $this->view->auta->data = $this->model->auta_wypozyczone() ;

$this->layout->content = $this->view ; 

       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji zwracam_auto($obj) z pliku model2 w zwrotu auta o podanym id
  */
function zwracam_auto() {
    $data = $_POST['data'] ;
       $obj  = json_decode($data) ;
       if (isset($obj->idauta) ) {    
            $response = $this->model->zwracam_auto($obj) ;
       }
       return ( $response ? "Auto zostało zwrócone" : "Blad " ) ;
    }





/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wyświetlanie tabeli pobranej z bazy danych funkcją listAllcars() z pliku model2 zawierającej dostępne auta
  */
function listAllcars()
{
$this->layout->tytul  = 'Lista dostępnych aut' ;
$this->layout->header = 'Lista dostępnych aut' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->listAllcars() ;
       $this->layout->content = $this->view ; 

       return $this->layout ;
}


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wyświetlanie tabeli pobranej z bazy danych funkcją histowia_napraw() z pliku model2 zawierającej historie napraw wszystkich aut
  */
function historia_napraw()
{
$this->layout->tytul  ='Historia napraw' ;
$this->layout->header = 'Historia napraw' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->historia_napraw() ;
       $this->layout->content = $this->view ; 

       return $this->layout ;
}


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wyświetlanie tabeli pobranej z bazy danych funkcją listAllcarstf() z pliku model2 zawierającej wszystkie auta(wypożyczone i dostępne)
  */
function listAllcarstf()
{
$this->layout->tytul  = 'Lista wszystkich aut' ;
$this->layout->header = 'Lista wszystkich aut' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->listAllcarstf() ;
       $this->layout->content = $this->view ; 

       return $this->layout ;
}


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wyświetlanie tabeli pobranej z bazy danych funkcją listAllklients() z pliku model2 zawierającej wszystkich klientów
  */
function listAllklients()
{
$this->layout->tytul  = 'Lista klientów' ;
$this->layout->header = 'Lista klientów' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->listAllklients() ;
       $this->layout->content = $this->view ; 

       return $this->layout ;
}


/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych potrzebnych do wypożyczenia samochodu oraz tabel z dostępnymi autami oraz klientami
  */
    function insertRec() {

       $this->layout->header = 'Formularz wypożyczenia' ;
$this->layout->tytul  = 'Formularz wypożyczenia';
        $this->view = new view('form') ;
$this->view->dostepneauta = new view('listAll');
        $this->view->dostepneauta->data = $this->model->listAllcars();
$this->view->klienci = new view('listAll');
        $this->view->klienci->data = $this->model->listAllklients();
       $this->layout->content = $this->view ;

       return $this->layout ;
    }



/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych potrzebnych do naprawy samochodu oraz tabel z wszystkimi autami
  */
    function dodaj_naprawe() {

       $this->layout->header = 'Dodaj naprawe' ;
$this->layout->tytul  = 'Dodaj naprawe' ;
       $this->view = new view('dodaj_naprawe') ;
$this->view->hist_napraw = new view('listAll');
       $this->view->hist_napraw->data = $this->model->naprawy() ;
$this->view->auta = new view('listAll');
       $this->view->auta->data = $this->model->listAllcarstf() ;
       $this->layout->content = $this->view ; 

       return $this->layout ;
    }




/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji saveRec($obj) z pliku model2 w celu dodania wypożyczenia do bazy danych
  */
    function saveRec() {

       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;
       if ( isset($obj->idklient) and isset($obj->idauta) and isset($obj->poczatek) and isset($obj->koniec)  ) {    
            $response = $this->model->saveRec($obj) ;
       }
       return ( $response ? "Dodano rekord" : "Blad " ) ;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji napraw($obj) z pliku model2 w dodania do bazy danych naprawy auta o podanym id i usterce
  */
function napraw_auto() {
    $data = $_POST['data'] ;
       $obj  = json_decode($data) ;
       if (isset($obj->idnaprawa) and isset($obj->idauta) ) {    
            $response = $this->model->napraw($obj);
       }
       return ( $response ? "Auto naprawione!" : "Blad " ) ;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji napraw_auto($obj) z pliku model2 w celu dodania nowego rodzaju naprawy i jej kosztu do bazy danych
  */
function naprawiam() {
    $data = $_POST['data'] ;
       $obj  = json_decode($data) ;
       if (isset($obj->rodzaj_naprawy) and isset($obj->koszt) ) {    
            $response = $this->model->napraw_auto($obj) ;
       }
       return ( $response ? "Dodano rekord do bazy napraw" : "Blad " ) ;
    }



/**
  * Funkcja odpowiedzialna za wyświetlanie szablonu pozwalającego na wprowadzanie danych potrzebnych do dodania nowego klienta do bazy danych
  */
	
function insertKlient() {

$this->layout->tytul  = 'Wprowadzanie klienta do bazy' ;
       $this->layout->header = 'Wprowadzanie klienta do bazy' ;
       $this->view = new view('formklientadres') ;
       $this->layout->content = $this->view ;
       return $this->layout ;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji saveKlient($obj) z pliku model2 w celu dodania nowego klienta do bazy danych
  */
function saveKlient() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

       if ( isset($obj->imie) and isset($obj->nazwisko) and isset($obj->telefon) and isset($obj->nr_do) and isset($obj->miasto) and isset($obj->wojewodztwo) and isset($obj->ulica) and isset($obj->nr_domu) ) {    

	if(empty($obj->nr_mieszkania))
		{$obj->nr_mieszkania=null;}
            $response = $this->model->saveKlient($obj) ;
       }
       return ( $response ? "Dodano klienta" : "yu Blad " ) ;
//return $response;
    }


/**
  * Funkcja odpowiedzialna za walidacje i przesłanie danych z formularza otrzymanych metodą _POST do funkcji dodaj_oddzial_js($obj) z pliku model2 w celu dodania nowego oddziału do bazy danych
  */
function dodaj_oddzial_js() {
       $data = $_POST['data'] ;
       $obj  = json_decode($data) ;

       if ( isset($obj->kierownik) and isset($obj->telefon) and isset($obj->miasto) and isset($obj->wojewodztwo) and isset($obj->ulica) and isset($obj->nr_domu) ) {    

	if(empty($obj->nr_mieszkania))
		{$obj->nr_mieszkania=null;}
            $response = $this->model->dodaj_oddzial_js($obj) ;
       }
       return ( $response ? "Dodano oddział" : "Błąd! " ) ;

    }



}

?>


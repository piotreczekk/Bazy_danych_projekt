
<?php



class model2 
{

   private $sth ;
   protected $user;
   protected $host;
   protected static $db;
   protected $pass;
   static $con;

/**
  * Konstruktor obiektu klasy model - logowanie się do bazy
  * 
  */
   function __construct()
   {


	$this->user="u3ponichtera"; 
	$this->pass="3ponichtera";
	$this->db="u3ponichtera";
	$this->host="localhost";

	self::$db = new PDO("pgsql:dbname=$this->db;user=$this->user;password=$this->pass");
self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę oddziałów
  */
   public function oddzial()
   {


      $this->sth = self::$db->prepare('SELECT * FROM oddzial_info');
      self::$db->beginTransaction();
try{
      $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}
      $result = $this->sth->fetchAll() ;
      return $result ;

   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca historię wypożyczeń
  */
   public function listAll()
   {

      $this->sth = self::$db->prepare('SELECT * FROM hist_wypo');
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;

   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca raporty
  */

   public function raport()
   {

      $this->sth = self::$db->prepare('SELECT * FROM raporty()');
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;

   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca historię wypożyczeń jako widok posortowany malejąco względem id wypożyczenias
  */
   public function listAllwypoDesc()
   {

      $this->sth = self::$db->prepare('SELECT * FROM hist_wypo_1');
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;

   }


/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca historie napraw
  */
   public function historia_napraw()
   {


      $this->sth = self::$db->prepare('SELECT * FROM historia_napraw');
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;

   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę napraw(rodzaj, koszt)
  */
   public function naprawy()
   {
      $this->sth = self::$db->prepare('SELECT * FROM naprawa');
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;

   }


/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca specyfijacje aut
  */
   public function szukaj_auto_js($obj)
   {



$this->sth = self::$db->prepare('select * from auto_specyfikacja_3 where typ= :typ and moc >= :mocmin and moc <= :mocmax and oddzial= :oddzial and miejsca >= :miejscamin and miejsca<= :miejscamax and bagaznik >= :bagaznikmin and bagaznik <= :bagaznikmax and cena_dzien <= :cena_dzien');

 $this->sth->bindValue(':oddzial',$obj->oddzial,PDO::PARAM_INT) ;
 $this->sth->bindValue(':typ',$obj->typ,PDO::PARAM_STR) ;
 $this->sth->bindValue(':mocmin',$obj->mocmin,PDO::PARAM_INT) ;
 $this->sth->bindValue(':mocmax',$obj->mocmax,PDO::PARAM_INT) ;
 $this->sth->bindValue(':miejscamin',$obj->miejscamin,PDO::PARAM_INT) ;
 $this->sth->bindValue(':miejscamax',$obj->miejscamax,PDO::PARAM_INT) ;
 $this->sth->bindValue(':bagaznikmin',$obj->bagaznikmin,PDO::PARAM_INT) ;
 $this->sth->bindValue(':bagaznikmax',$obj->bagaznikmax,PDO::PARAM_INT) ;
 $this->sth->bindValue(':cena_dzien',$obj->cena_dzien,PDO::PARAM_INT) ;


$this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
return $result;

   }





/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca wypożyczenia z danego okresu
  */
   public function szukaj_wypo($obj)
   {


$this->sth = self::$db->prepare('SELECT * FROM hist_wypo where data_pocz::date >= now()::date - :okres::integer');
 $this->sth->bindValue(':okres',$obj->okres,PDO::PARAM_INT) ;


       $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      
      return $result ;

   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, dodaje nową markę(marka, model) auta
  */
   public function dodaj_model_auta_js($obj)
   {
$this->sth = self::$db->prepare('insert into marka_auta(marka,model) values(:marka,:model)') ;

      $this->sth->bindValue(':marka',$obj->marka,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':model',$obj->model,PDO::PARAM_STR) ; 

self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 


}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, dodaje nowe auto do tabeli aut
  */
   public function dodaj_auto_js($obj)
   {
$this->sth = self::$db->prepare('insert into auto(moc,bagaznik,miejsca,cena_dzien,typ_auta,marka_auta,oddzial) values(:moc,:bagaznik,:miejsca,:cena_dzien,:typ,:marka_auta,:oddzial)') ;


      $this->sth->bindValue(':moc',$obj->moc,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':bagaznik',$obj->bagaznik,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':miejsca',$obj->miejsca,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':cena_dzien',$obj->cena_dzien,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':typ',$obj->typ,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':marka_auta',$obj->marka,PDO::PARAM_INT) ; 
	$this->sth->bindValue(':oddzial',$obj->oddzial,PDO::PARAM_INT) ; 

self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 
}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, usuwa auto o podanym id
  */
   public function usun_auto_js($obj)
   {

$this->sth = self::$db->prepare('delete from auto where id=:idauta') ;
$this->sth1 = self::$db->prepare('delete from auto_naprawa where auto=:idauta') ;
$this->sth2 = self::$db->prepare('delete from wypozyczenie where auto=:idauta');

$this->sth2->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT);

      $this->sth->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ; 
$this->sth1->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ; 
	$resp = ( $this->sth2->execute() ? 'true' : 'false');
      $resp = ( $this->sth1->execute() ? 'true' : 'false' ) ;
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 


}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, usuwa wypożyczenie o podanym id
  */
   public function usun_wypozyczenie_js($obj)
   {

$this->sth = self::$db->prepare('delete FROM wypozyczenie where id= :idwypozyczenia');
 $this->sth->bindValue(':idwypozyczenia',$obj->idwypozyczenia,PDO::PARAM_INT) ;


   self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 



   }



/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca historię wypożyczeń auta o podanym id
  */
   public function hist_auta_wypo($obj)
   {
  
$this->sth = self::$db->prepare('SELECT * FROM hist_wypo where id= :idauta');
 $this->sth->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ;


       $this->sth->execute() ;

      $result = $this->sth->fetchAll() ;
      
      return $result ;



   }

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca historie napraw auta o podanym id
  */
   public function hist_auta_naprawa($obj)
   {
  
$this->sth = self::$db->prepare('SELECT n.rodzaj, n.koszt, an.data_naprawy FROM auto_naprawa an, naprawa n, auto a where an.naprawa=n.id and an.auto=:idauta and an.auto=a.id');
 $this->sth->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ;


       $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      
      return $result ;



   }






/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę wypożyczeń z danego okresu
  */
   public function historia_auta($obj)
   {


$this->sth = self::$db->prepare('SELECT * FROM hist_wypo where data_pocz::date >= now()::date - :okres::integer');
 $this->sth->bindValue(':okres',$obj->okres,PDO::PARAM_INT) ;


       $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      
      return $result ;

   }


/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę wszystkich aut ze specyfikacją z widoku
  */
  public function listAllcarstf()
{
      $this->sth = self::$db->prepare('SELECT * FROM auto_specyfikacja_1') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę dostępnych aut ze specyfikacją z widoku
  */
   public function listAllcars()
{
      $this->sth = self::$db->prepare('SELECT * FROM auto_specyfikacja') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
}


/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę wypożyczonych aut ze specyfikacją z widoku
  */
   public function auta_wypozyczone()
{
      $this->sth = self::$db->prepare('SELECT * FROM auto_specyfikacja_2') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
}


/**
  * Funkcja wysyłająca zapytanie do bazy danych, w tym przypadku update'uje tabele auta ustawiając pole dostępność na true gdy zwracamy auto
  */
   public function zwracam_auto($obj)
   {
$this->sth = self::$db->prepare('update auto set dostepnosc=true where auto.id=:idauta') ;

      $this->sth->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ; 

self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 



}
/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę klientów
  */
  public function listAllklients()
{
      $this->sth = self::$db->prepare('select klient.id, imie, nazwisko, telefon, nr_do, miasto, wojewodztwo, ulica, nr_domu, nr_mieszkania from klient inner join adres on adres.id=klient.adres') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
}


/**
  * Funkcja wysyłająca zapytanie do bazy danych, zwraca listę modeli aut(marka,model)
  */
  public function listAllmodel()
{
      $this->sth = self::$db->prepare('select * from marka_auta') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, wstawia do tabeli rodzajów napraw nowy rekord
  */
   public function napraw_auto($obj)
   {

$this->sth = self::$db->prepare('insert into naprawa(rodzaj,koszt) values(:rodzaj_naprawy,:koszt)
') ;

      $this->sth->bindValue(':rodzaj_naprawy',$obj->rodzaj_naprawy,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':koszt',$obj->koszt,PDO::PARAM_INT) ; 

self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 



}

/**
  * Funkcja wysyłająca zapytanie do bazy danych, wstawia do tabeli napraw nową naprawę danego auta
  */
   public function napraw($obj)
   {
$this->sth = self::$db->prepare('select * from napraw(:idauta,:naprawa)') ;

      $this->sth->bindValue(':idauta',$obj->idauta,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':naprawa',$obj->idnaprawa,PDO::PARAM_INT) ; 

self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 




}


/**
  * Funkcja wysyłająca zapytanie do bazy danych, wywołuje funkcje odpowiedzialną za wypożyczenie auta
  */

   public function saveRec($obj)
   {


$this->sth = self::$db->prepare('select * from zamow(:au,:d1,:d2,:kl)
') ;
      $this->sth->bindValue(':d1',$obj->poczatek,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':d2',$obj->koniec,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':kl',$obj->idklient,PDO::PARAM_INT) ; 
      $this->sth->bindValue(':au',$obj->idauta,PDO::PARAM_INT) ; 


self::$db->beginTransaction();

$resp =1;
try{
      $resp = $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

      $resp = ( $resp ? 'true' : 'false' ) ;

      return $resp ; 


   }


/**
  * Funkcja wysyłająca zapytanie do bazy danych, wstawia do tabeli klientów nowy rekord
  */
public function saveKlient($obj)
{

$resp = 'true';
$this->sth = self::$db->prepare('INSERT INTO adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) VALUES( :miasto, :wojewodztwo, :ulica,:nr_domu, :nr_mieszkania) ') ;
     $this->sth->bindValue(':miasto',$obj->miasto,PDO::PARAM_STR) ; 
     $this->sth->bindValue(':wojewodztwo',$obj->wojewodztwo,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':ulica',$obj->ulica,PDO::PARAM_STR) ; 
$this->sth->bindValue(':nr_domu',$obj->nr_domu,PDO::PARAM_INT) ; 
$this->sth->bindValue(':nr_mieszkania',$obj->nr_mieszkania,PDO::PARAM_INT) ; 

self::$db->beginTransaction();
try{
      $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}


$getid = self::$db->prepare('SELECT last_value FROM adres_id_seq');
$resp2 = ($getid->execute() ? 'true' : 'false' ); 

$getid = $getid->fetch();
$id = $getid['last_value'];



$this->sth = self::$db->prepare('INSERT INTO klient(imie, nazwisko, telefon, nr_do,adres) VALUES( :imie, :nazwisko, :telefon, :nr_do, :adres) ');
$this->sth->bindValue(':imie',$obj->imie,PDO::PARAM_STR) ;
$this->sth->bindValue(':nazwisko',$obj->nazwisko,PDO::PARAM_STR) ;
$this->sth->bindValue(':telefon',$obj->telefon,PDO::PARAM_STR) ;
$this->sth->bindValue(':nr_do',$obj->nr_do,PDO::PARAM_STR) ;
$this->sth->bindValue(':adres',$id,PDO::PARAM_INT) ;   

self::$db->beginTransaction();
try{
      $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

return $resp;
}


/**
  * Funkcja wysyłająca zapytanie do bazy danych, wstawia do tabeli oddziałów nowy rekord
  */
public function dodaj_oddzial_js($obj)
{

$resp = 'true';
$this->sth = self::$db->prepare('INSERT INTO adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) VALUES( :miasto, :wojewodztwo, :ulica,:nr_domu, :nr_mieszkania) ') ;
     $this->sth->bindValue(':miasto',$obj->miasto,PDO::PARAM_STR) ; 
     $this->sth->bindValue(':wojewodztwo',$obj->wojewodztwo,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':ulica',$obj->ulica,PDO::PARAM_STR) ; 
$this->sth->bindValue(':nr_domu',$obj->nr_domu,PDO::PARAM_INT) ; 
$this->sth->bindValue(':nr_mieszkania',$obj->nr_mieszkania,PDO::PARAM_INT) ; 

self::$db->beginTransaction();
try{
      $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

$getid = self::$db->prepare('SELECT last_value FROM adres_id_seq');
$resp2 = ($getid->execute() ? 'true' : 'false' ); 

$getid = $getid->fetch();
$id = $getid['last_value'];

$this->sth = self::$db->prepare('INSERT INTO oddzial(kierownik, telefon, adres) VALUES( :kierownik, :telefon, :adres) ');
$this->sth->bindValue(':kierownik',$obj->kierownik,PDO::PARAM_STR) ;
$this->sth->bindValue(':telefon',$obj->telefon,PDO::PARAM_STR) ;
$this->sth->bindValue(':adres',$id,PDO::PARAM_INT) ;   
self::$db->beginTransaction();
try{
      $this->sth->execute();
self::$db->commit();

}

catch( PDOException $e ) {
self::$db->rollBack();
$resp =  $e->getMessage();
}

return $resp;
}




}

?>







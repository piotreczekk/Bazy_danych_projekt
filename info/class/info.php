<?php

class info extends controller {

   protected $layout ;
   protected $model ;

/**
  * Konstruktor obiektu klasy info
  */
   function __construct() {
      parent::__construct() ;
      $this->layout = new view('main') ; 
      $this->layout->css = $this->css ;
      $this->layout->menu = $this->menu ;   
      $this->layout->title = 'Witaj na stronie głównej wypożyczalni samochodów' ;
   }
/**
  * Funkcja odpowiedzialna za wyświetlanie informacji na stronie głównej
  */
  function index() {
      $this->layout->header  = 'Witam' ;
      $this->layout->content = 'To jest strona główna wypożyczalni samochodów. Z menu po lewej stronie wybierz operacje, którą chcesz wykonać' ;
$this->layout->tytul  = 'Strona główna' ;
      return $this->layout ;
  }
    


}

?>


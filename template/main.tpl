<!-- Szablon odpowiadający za wyświetlanie elementów strony logowania a następnie strony głównej -->


<?php
session_start();

if(isset($_GET['akcja']) && $_GET['akcja']=='wyloguj')
{
	unset($_SESSION['zalogowany']);
}

if(isset($_POST['haslo']) && $_POST['haslo']=='admin1' && isset($_POST['login']) && $_POST['login']=='admin')
{
	$_SESSION['zalogowany']=1;
}



?>

<!DOCTYPE HTML>

<html>
  <head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <title><?php echo $tytul ; ?></title>
   <?php echo $css; ?>    

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/ui-darkness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script type="text/JavaScript" src="js/baza.js"></script> 
</script>



</head>
  <body>

<?php 

if(!isset($_SESSION['zalogowany']))
{

?>
<html><body>
<form method="post" action="index.php">
Login: <input type="text" name="login"><p></p>
Haslo: <input type="password" name="haslo"><p></p>
<input type="submit" value="Zaloguj">
</form>
</html></body>

<?php

} else {

?>


     <header><?php echo $title ; ?></header>
     <nav><?php echo $menu ; ?></nav>
     <section>
        <header><?php echo $header ; ?></header>
        <article><?php echo $content ; ?>
     </section>   
     <footer>Bazy danych I </footer>   

<?php 

}

?>

  </body>
</html>




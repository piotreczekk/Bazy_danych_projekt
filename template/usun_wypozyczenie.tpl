<!-- Szablon odpowiadający za usuwanie wypożyczenia o podanym ID-->



<form name="usun_wypozyczenia">            
  <table>
    <tr><td><label for="idwypozyczenia">ID wypożyczenia:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idwypozyczenia']; ?>" type="text" id="idwypozyczenia" name="idwypozyczenia" /></td></tr>




    <tr><td><span id="data"><input type="button" value="Usuń" onclick="usun_wypozyczenie_js()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 
<p></p>
Wypożyczenia
<?php

echo $wypozyczenia;

?>
<p></p>

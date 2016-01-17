<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowego wypożyczenia -->


<form name="form">            
  <table>
    <tr><td><label for="idklient">ID klienta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idklient']; ?>" type="text" id="idklient" name="idklient" /></td></tr>
    <tr><td><label for="idauta">ID auta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idauta']; ?>" type="text" id="idauta" name="idauta" /></td></tr>


<tr><td><label for="poczatek">Początek:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['poczatek']; ?>" type="text" name="selected_date" id="datepicker" /></td></tr>
<tr><td><label for="koniec">Koniec:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['koniec']; ?>" type="text" name="selected_date" id="datepicker1" /></td></tr>

    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="wypo_save()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 
<p></p>
Dostępne auta:
<?php

echo $dostepneauta;

?>

Lista klientów:
<p></p>
<?php

echo $klienci;

?>




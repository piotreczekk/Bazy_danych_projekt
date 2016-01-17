<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowej naprawy -->


<form name="form">            
  <table>

    <tr><td><label for="rodzaj_naprawy">Rodzaj naprawy:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['rodzaj_naprawy']; ?>" type="text" id="rodzaj_naprawy" name="rodzaj_naprawy" /></td></tr>


<tr><td><label for="koszt">Koszt:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['koszt']; ?>" type="text" name="koszt" id="koszt" /></td></tr>


    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="dodaj_naprawe()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 

<p></p>
Lista możliwyc napraw
<?php

echo $hist_napraw;

?>
<p></p>

Napraw auto
<form name="form">            
  <table>
    <tr><td><label for="idauta1">ID auta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idauta1']; ?>" type="text" id="idauta1" name="idauta1" /></td></tr>
    <tr><td><label for="idnaprawa">ID naprawy:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idnaprawa']; ?>" type="text" id="idnaprawa" name="idnaprawa" /></td></tr>



    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="napraw_auto()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 

<p></p>
Lista aut które mogą być naprawiane
<?php

echo $auta;

?>


<!-- Szablon odpowiadający za pobieranie ID auta, które chcemy zwrócić -->



Wypożyczone auta:
<?php

echo $auta;

?>
<p></p>

<form name="historia_auta">            
  <table>
    <tr><td><label for="idauta">ID auta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idauta']; ?>" type="text" id="idauta" name="idauta" /></td></tr>




    <tr><td><span id="data"><input type="button" value="Sprawdź" onclick="zwracam()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 
<p></p>

<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na wyświetlanie historii napraw danego auta -->


Auta:
<?php

echo $auta;

?>
<p></p>

<form name="historia_auta">            
  <table>
    <tr><td><label for="idauta">ID auta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idauta']; ?>" type="text" id="idauta" name="idauta" /></td></tr>




    <tr><td><span id="data"><input type="button" value="Sprawdź" onclick="hist_auta_naprawa()" /></span></td>
  



  </table>
</form> 
<p></p>
  <td><span id="response"></span></td></tr>

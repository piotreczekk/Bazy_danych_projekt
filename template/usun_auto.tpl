<!-- Szablon odpowiadający za usuwanie auta i podanym przez użytkownika ID -->


<form name="form">            
  <table>
    <tr><td><label for="idauta">ID auta:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['idauta']; ?>" type="text" id="idauta" name="idauta" /></td></tr>



    <tr><td><span id="data"><input type="button" value="Usuń" onclick="usun_auto()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 
<p></p>
Aktualna lista aut:
<?php

echo $auta;

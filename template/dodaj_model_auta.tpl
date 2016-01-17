<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowego modelu(marka,model) auta -->

<form name="form">            
  <table>
    <tr><td><label for="marka">Marka:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['marka']; ?>" type="text" id="marka" name="marka" /></td></tr>
    <tr><td><label for="model">Model:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['model']; ?>" type="text" id="model" name="model" /></td></tr>


    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="dodaj_model_auta()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 
<p></p>
Aktualna lista modeli aut:
<?php

echo $auta;





<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowego oddziału -->

<form name="form">            
  <table>
<p>Podaj dane oddziału</p>
    <tr><td><label for="kierownik">Kierwonik:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['kierownik']; ?>" type="text" id="kierownik" name="kierownik" /></td></tr>

<tr><td><label for="telefon">Telefon:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['telefon']; ?>" type="text" id="telefon" name="telefon" /></td></tr>

<tr><td><label for="miasto">Miasto:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['miasto']; ?>" type="text" id="miasto" name="miasto" /></td></tr>

<tr><td><label for="wojewodztwo">Wojewodztwo:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['wojewodztwo']; ?>" type="text" id="wojewodztwo" name="wojewodztwo" /></td></tr>

<tr><td><label for="ulica">Ulica:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['ulica']; ?>" type="text" id="ulica" name="ulica" /></td></tr>

<tr><td><label for="nr_domu">Numer domu:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nr_domu']; ?>" type="text" id="nr_domu" name="nr_domu" /></td></tr>

<tr><td><label for="nr_mieszkania">Numer mieszkania:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nr_mieszkania']; ?>" type="text" id="nr_mieszkania" name="nr_mieszkania" /></td></tr>


    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="dodaj_oddzial()" /></span></td>

  </table>
</form> 

<td><span id="response"></span></td></tr>

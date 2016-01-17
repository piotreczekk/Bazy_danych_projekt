<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowego klienta -->

<form name="form">            
  <table>
<p>Podaj swoje dane</p>
    <tr><td><label for="imie">Imie:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['imie']; ?>" type="text" id="imie" name="imie" /></td></tr>

<tr><td><label for="nazwisko">Nazwisko:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nazwisko']; ?>" type="text" id="nazwisko" name="nazwisko" /></td></tr>

<tr><td><label for="telefon">Telefon:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['telefon']; ?>" type="text" id="telefon" name="telefon" /></td></tr>

<tr><td><label for="nr_do">Numer dowodu osobistego:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nr_do']; ?>" type="text" id="nr_do" name="nr_do" /></td></tr>


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


    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="klient_save()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form> 

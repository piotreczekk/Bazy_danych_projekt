<!-- Szablon odpowiadający za wprowadzania danych potrzebnych do znalezienia konkretnego auta -->


<form name="form">            
  <table>


<tr><td><label for="typ">Typ:</label></td>
<td><select label for="typ" name="typ" id="typ" >
<option value="0">--Wybierz typ auta--</option>
<option value="Hatchback">Hatchback</option>
<option value="Sedan">Sedan</option>
<option value="Kombi">Kombi</option>
<option value="Suv">Suv</option>
<option value="Bus">Bus</option>
</select>
</td>
</td></tr>

<tr><td><label for="moc">Moc: (od-do)</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['mocmin']; ?>" type="text" id="mocmin" name="mocmin" /></td>
<td><input value="<?php if(isset($formData)) echo $formData['mocmin']; ?>" type="text" id="mocmax" name="mocmax" /></td></tr>


<tr><td><label for="miejsca">Miejsca (od-do)</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['miejsca']; ?>" type="text" id="miejscamin" name="miejsca" /></td>
<td><input value="<?php if(isset($formData)) echo $formData['miejsca']; ?>" type="text" id="miejscamax" name="miejsca" /></td></tr>


<tr><td><label for="bagaznik">Pojemność bagażnika: (od-do)</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['bagaznik']; ?>" type="text" name="bagaznik" id="bagaznikmin" /></td>
<td><input value="<?php if(isset($formData)) echo $formData['bagaznik']; ?>" type="text" name="bagaznik" id="bagaznikmax" /></td></tr>


<tr><td><label for="cena_dzien">Cena za dzień: (cena max)</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['cena_dzien']; ?>" type="text" name="cena_dzien" id="cena_dzien" /></td></tr>

<tr><td><label for="oddzial">Oddzial:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['oddzial']; ?>" type="text" name="oddzial" id="oddzial" /></td></tr>

    <tr><td><span id="data"><input type="button" value="Szukaj" onclick="szukaj_auto_js()" /></span></td>




  </table>
</form> 



<p><span id="response"></span></p>


<!-- Szablon odpowiadający za wyświetlanie formluarza pozwalającego na dodanie nowego auta -->

<form name="form">            
  <table>
    <tr><td><label id="markaa" for="markaa">ID model:</label></td>
    <td><?php


	$this->user="u3ponichtera";
	$this->pass="3ponichtera";
	$this->db="u3ponichtera";


$db = new PDO("pgsql:dbname=$this->db;user=$this->user;password=$this->pass");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


  $sth = $db->prepare('SELECT * from marka_auta');
     $sth->execute();
     
      $data = $sth->fetchAll() ;

 $keys = array();
    foreach (array_values($data)[0] as $key => $value) {
        if (!is_numeric($key))
            array_push($keys, $key);
    }
    
echo '<select label for="marka" name="marka" id="marka" >';
		echo '<option value="">--Wybierz model auta--</option>';
    foreach ($data as $record) {

echo '<option value="' . $record[id] . '">';
			echo $record[marka]. " " .$record[model];
			echo '</option>';

    }



?></td></tr>

<tr><td><label for="typ">Typ:</label></td>
<td><select label for="typ" name="typ" id="typ" >
<option value="0">--Wybierz typ auta--</option>
<option value="1">Hatchback</option>
<option value="2">Sedan</option>
<option value="3">Kombi</option>
<option value="4">Suv</option>
<option value="5">Bus</option>
</select>
</td>
</td></tr>

<tr><td><label for="moc">Moc:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['moc']; ?>" type="text" id="moc" name="moc" /></td></tr>
<tr><td><label for="miejsca">Miejsca</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['miejsca']; ?>" type="text" id="miejsca" name="miejsca" /></td></tr>


<tr><td><label for="bagaznik">Pojemność bagażnika:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['bagaznik']; ?>" type="text" name="bagaznik" id="bagaznik" /></td></tr>
<tr><td><label for="cena_dzien">Cena za dzień:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['cena_dzien']; ?>" type="text" name="cena_dzien" id="cena_dzien" /></td></tr>
<tr><td><label for="oddzial">Oddzial:</label></td>
<td><input value="<?php if(isset($formData)) echo $formData['oddzial']; ?>" type="text" name="oddzial" id="oddzial" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="dodaj_auto_js()" /></span></td>
    <td><span id="response"></span></td></tr>



  </table>
</form> 


<p></p>
Lista aut:
<?php

echo $auta;







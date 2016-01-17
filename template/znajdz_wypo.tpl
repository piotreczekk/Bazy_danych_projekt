<!-- Szablon odpowiadający za wyświetlanie historii wypożyczeń z podanego okresu -->


<form name="znajdz_wypo">
<table>
<select label for="okres" name="okres" id="okres" >
<option value="0">--Wybierz okres czasu--</option>
<option value="7">Tydzień</option>
<option value="31">Miesiąc</option>
<option value="365">Rok</option>
<option value="365000">Wszystkie</option>
</select>
<p></p>
<span id="data"><input type="button" value="Szukaj" onclick="szukaj_wypo()" /></span>
<span id="response"></span>
</table>
</form>

<p></p>




/* Funkcja pobierająca id wypożyczenia z formularza i wysyłająca metodą POST przyjęty parametr do funkcji usun_wypozyczenie_js() w katalogu baza i wypisująca zwrówoną przez nią wartość */
function usun_wypozyczenie_js()
{

     var idwypozyczenia = document.getElementById("idwypozyczenia").value ;


     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"idwypozyczenia\":\"" + idwypozyczenia + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=usun_wypozyczenie_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;    

} 

/* Funkcja pobierająca dane potrzebne do znalezienia konkretnego auta z formularza i wysyłająca metodą POST przyjęte parametry do funkcji szukaj_auto_js() w katalogu baza i wypisująca zwrówoną przez nią wartość */
function szukaj_auto_js()
{

var typ = document.getElementById("typ").value ;
var mocmin = document.getElementById("mocmin").value ;
var mocmax = document.getElementById("mocmax").value ;
var miejscamin = document.getElementById("miejscamin").value ;
var miejscamax = document.getElementById("miejscamax").value ;
var bagaznikmin = document.getElementById("bagaznikmin").value ;
var bagaznikmax = document.getElementById("bagaznikmax").value ;
var cena_dzien = document.getElementById("cena_dzien").value ;
var oddzial = document.getElementById("oddzial").value ;

     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"typ\":\"" + typ + "\",\"mocmin\":\"" + mocmin + "\",\"mocmax\":\"" + mocmax +"\",\"miejscamin\":\"" + miejscamin + "\",\"miejscamax\":\"" + miejscamax + "\",\"bagaznikmin\":\"" + bagaznikmin  + "\",\"bagaznikmax\":\"" + bagaznikmax +"\",\"cena_dzien\":\"" + cena_dzien + "\",\"oddzial\":\"" + oddzial + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=szukaj_auto_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;    

} 

/* Funkcja pobierająca dane potrzebne do dodania nowego auta z formularza i wysyłająca metodą POST przyjęte parametry do funkcji dodaj_auto_js() w katalogu baza i wypisująca zwrówoną przez nią wartość */
function dodaj_auto_js()
{

     var marka = document.getElementById("marka").value ;
var typ = document.getElementById("typ").value ;
var moc = document.getElementById("moc").value ;
var miejsca = document.getElementById("miejsca").value ;
var bagaznik = document.getElementById("bagaznik").value ;
var cena_dzien = document.getElementById("cena_dzien").value ;
var oddzial = document.getElementById("oddzial").value ;

     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"marka\":\"" + marka + "\",\"typ\":\"" + typ + "\",\"moc\":\"" + moc +"\",\"miejsca\":\"" + miejsca +"\",\"bagaznik\":\"" + bagaznik +"\",\"cena_dzien\":\"" + cena_dzien + "\",\"oddzial\":\"" + oddzial +"\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=dodaj_auto_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;    

}  

/* Funkcja pobierająca id auta z formularza i wysyłająca metodą POST przyjęty parametr do funkcji hist_auta_wypo() w katalogu baza i wypisująca zwrówoną przez nią wartość */
function hist_auta()
{

     var idauta = document.getElementById("idauta").value ;


     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"idauta\":\"" + idauta + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=hist_auta_wypo" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;    

}  

/* Funkcja pobierająca id auta, które ma zostać usunięte z formularza i wysyłająca metodą POST przyjęty parametr do funkcji usun_auto_js() w katalogu baza i wypisująca zwrówoną przez nią wartość */

function usun_auto()
{

     var idauta = document.getElementById("idauta").value ;


     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"idauta\":\"" + idauta +"\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=usun_auto_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}

/* Funkcja pobierająca dane potrzebne do dodania nowego modelu auta z formularza i wysyłająca metodą POST przyjęty parametr do funkcji dodaj_model_auta_js() w katalogu baza i wypisująca zwrówoną przez nią wartość 
Drugi poziom walidacji danych.
*/

function dodaj_model_auta()
{

var isMarka = /^([A-ZŁ]{1}[a-złóśćęńążź]+)$/;


     var marka = document.getElementById("marka").value ;
	var model = document.getElementById("model").value ;

text="";
if(isMarka.test(marka) != true)
{
text+="Nie ma takiej marki!\n";
}
if(isMarka.test(model) != true)
{
text+="Nie ma takiego modelu!\n";
}

if(text!="")
{
	alert(text);
}

else
{

     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"marka\":\"" + marka + "\",\"model\":\"" + model +"\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=dodaj_model_auta_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}

}

/* Funkcja pobierająca id auta które ma zostać zwrócone  z formularza i wysyłająca metodą POST przyjęty parametr do funkcji zwracam_auto() w katalogu baza i wypisująca zwrówoną przez nią wartość */

function zwracam()
{

     var idauta = document.getElementById("idauta").value ;


     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"idauta\":\"" + idauta + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=zwracam_auto" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}


/* Funkcja pobierająca id auta którego historie napraw chcemy wyświetlić z formularza i wysyłająca metodą POST przyjęty parametr do funkcji hist_auta_naprawa() w katalogu baza i wypisująca zwrówoną przez nią wartość */

function hist_auta_naprawa()
{

     var idauta = document.getElementById("idauta").value ;


     document.getElementById("data").style.display = "block" ;
     var json_data = "{\"idauta\":\"" + idauta + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=hist_auta_naprawa" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}

/* Funkcja pobierająca dane potrzebne do dodania naprawy z formularza i wysyłająca metodą POST przyjęty parametr do funkcji naprawiam() w katalogu baza i wypisująca zwrówoną przez nią wartość.
Drugi poziom walidacji danych.
*/

function dodaj_naprawe()
{

     var rodzaj_naprawy = document.getElementById("rodzaj_naprawy").value ;
     var koszt = document.getElementById("koszt").value ;


var isImieNazwisko = /^([A-ZŁ]{1}[a-złóśćęńążź]+)$/;
var isNumeric = /^([0-9]+)$/;

var text ="";

if(isImieNazwisko.test(rodzaj_naprawy) != true)
{
text+="Nie ma takiej naprawy!\n";
}
if(isNumeric.test(koszt) != true)
{
text+="Zły koszt!\n";
}

if(text!="")
{
	alert(text);
}
else
{

     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"rodzaj_naprawy\":\"" + rodzaj_naprawy + "\",\"koszt\":\"" + koszt + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=naprawiam" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}
}


/* Funkcja pobierająca dane potrzebne do dodania naprawy auta z formularza i wysyłająca metodą POST przyjęty parametr do funkcji napraw_auto() w katalogu baza i wypisująca zwrówoną przez nią wartość */
function napraw_auto()
{
var idauta = document.getElementById("idauta1").value ;
     var idnaprawa = document.getElementById("idnaprawa").value ;
     


     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"idnaprawa\":\"" + idnaprawa + "\",\"idauta\":\"" + idauta + "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=napraw_auto" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;      

}



/* Funkcja pobierająca dane potrzebne do dodania nowego rekordu wypożyczenia z formularza i wysyłająca metodą POST przyjęty parametr do funkcji saveRec() w katalogu baza i wypisująca zwrówoną przez nią wartość Drugi poziom walidacji danych.
*/
function wypo_save()
 {
     var idklient = document.getElementById("idklient").value ;
     var idauta = document.getElementById("idauta").value ;
     var poczatek  = document.getElementById("datepicker").value ;
     var koniec  = document.getElementById("datepicker1").value ;
     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"idklient\":\"" + idklient + "\",\"idauta\":\"" + idauta + "\",\"poczatek\":\"" + poczatek + "\",\"koniec\":\"" + koniec +  "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=saveRec" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;                          
}   


/* Funkcja pobierająca dane potrzebne do dodania nowego oddziału z formularza i wysyłająca metodą POST przyjęty parametr do funkcji dodaj_oddzial_js() w katalogu baza i wypisująca zwrówoną przez nią wartość.
Drugi poziom walidacji danych.
*/

function dodaj_oddzial()
{



var isImieNazwisko = /^([A-ZŁ]{1}[a-złóśćęńążź]+\s+[A-ZŁ]{1}[a-złóśćęńążź]+)$/;
var isNazwa = /^([A-ZŁ]{1}[a-złóśćęńążź]+)$/;
var isNumeric = /^([0-9]+)$/;
var isDowod = /^[a-zA-Z]{3}[0-9]{6}$/;
var text="";


var kierownik = document.getElementById("kierownik").value ;

     var telefon  = document.getElementById("telefon").value ;


    var miasto  = document.getElementById("miasto").value ;
    var wojewodztwo = document.getElementById("wojewodztwo").value ;
    var ulica  = document.getElementById("ulica").value ;
    var nr_domu  = document.getElementById("nr_domu").value ;
    var nr_mieszkania  = document.getElementById("nr_mieszkania").value ;

if(isNumeric.test(telefon) != true)
{
text+="zły numer telefonu!\n";
}
if(isImieNazwisko.test(kierownik) != true)
{
text+="Niepoprawne imie i nazwisko kierownika!\n";
}
if(isNazwa.test(ulica) != true)
{
text+="Niepoprawna ulica!\n";
}
if(isNazwa.test(miasto) != true)
{
text+="Niepoprawne miasto!\n";
}
if(isNazwa.test(wojewodztwo) != true)
{
text+="Niepoprawne województwo!\n";
}

if(text!="")
{
	alert(text);
}





else
{
     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"kierownik\":\"" + kierownik + "\",\"telefon\":\"" + telefon + "\",\"miasto\":\"" + miasto + "\",\"ulica\":\"" + ulica+ "\",\"wojewodztwo\":\"" + wojewodztwo +"\",\"nr_domu\":\"" + nr_domu +"\",\"nr_mieszkania\":\"" + nr_mieszkania +"\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=dodaj_oddzial_js" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;  

}

}

/* Funkcja pobierająca dane potrzebne do dodania nowego klienta z formularza i wysyłająca metodą POST przyjęty parametr do funkcji saveKlient() w katalogu baza i wypisująca zwrówoną przez nią wartość.
Drugi poziom walidacji danych.
*/

function klient_save()
{


var isImieNazwisko = /^([A-ZŁ]{1}[a-złóśćęńążź]+)$/;
var isNumeric = /^([0-9]+)$/;
var isDowod = /^[a-zA-Z]{3}[0-9]{6}$/;
var text="";


var imie = document.getElementById("imie").value ;
     var nazwisko = document.getElementById("nazwisko").value ;
     var telefon  = document.getElementById("telefon").value ;
    var nr_do  = document.getElementById("nr_do").value ;

    var miasto  = document.getElementById("miasto").value ;
    var wojewodztwo = document.getElementById("wojewodztwo").value ;
    var ulica  = document.getElementById("ulica").value ;
    var nr_domu  = document.getElementById("nr_domu").value ;
    var nr_mieszkania  = document.getElementById("nr_mieszkania").value ;

if(isNumeric.test(telefon) != true)
{
text+="zły numer telefonu!\n";
}
if(isDowod.test(nr_do) != true)
{
text+="zły numer dowodu osobistego!\n";
}
if(isImieNazwisko.test(imie) != true)
{
text+="Niepoprawne imie!\n";
}
if(isImieNazwisko.test(nazwisko) != true)
{
text+="Niepoprawne nazwisko!\n";
}
if(isImieNazwisko.test(ulica) != true)
{
text+="Niepoprawna ulica!\n";
}
if(isImieNazwisko.test(miasto) != true)
{
text+="Niepoprawne miasto!\n";
}
if(isImieNazwisko.test(wojewodztwo) != true)
{
text+="Niepoprawne województwo!\n";
}

if(text!="")
{
	alert(text);
}





else
{
     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"imie\":\"" + imie + "\",\"nazwisko\":\"" + nazwisko + "\",\"telefon\":\"" + telefon + "\",\"nr_do\":\"" + nr_do + "\",\"miasto\":\"" + miasto + "\",\"ulica\":\"" + ulica+ "\",\"wojewodztwo\":\"" + wojewodztwo +"\",\"nr_domu\":\"" + nr_domu +"\",\"nr_mieszkania\":\"" + nr_mieszkania +"\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=saveKlient" ;
     resp = function(response) {
        // alert ( response ) ;
        document.getElementById("response").innerHTML = response ; 
      }

      xmlhttpPost (url, msg, resp) ;  

}

}



/* Funkcja pobierająca okres czasu z którego mają zostać wyświetlone wypożyczenia z formularza i wysyłająca metodą POST przyjęty parametr do funkcji szukaj_wypo() w katalogu baza i wypisująca zwrówoną przez nią wartość */

function szukaj_wypo()
{
var okres = document.getElementById("okres").value;
console.log(okres);


document.getElementById("data").style.display = "block" ;
     var json_data = "{\"okres\":\"" + okres +  "\"}" ;
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=szukaj_wypo" ;
     resp = function(response) {
        //alert ( response ) ;

      document.getElementById("response").innerHTML = response ; 
      }



      xmlhttpPost (url, msg, resp) ;  

}




function xmlhttpPost(strURL, mess, respFunc) {
    var xmlHttpReq = false;
    var self = this;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.onreadystatechange = function() {
    if(self.xmlHttpReq.readyState == 4){
        // alert ( self.xmlHttpReq.status ) ;
        if ( self.xmlHttpReq.status == 200 ) {    
           // document.getElementById("data").innerHTML = http_request.responseText;
          respFunc( self.xmlHttpReq.responseText ) ;
        }
        else if ( self.xmlHttpReq.status == 401 ) {
           window.location.reload() ;
        } 
      }
    }
    self.xmlHttpReq.open('POST', strURL);
    self.xmlHttpReq.setRequestHeader("X-Requested-With","XMLHttpRequest");
    self.xmlHttpReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded; ");
    self.xmlHttpReq.setRequestHeader("Content-length", mess.length);
    self.xmlHttpReq.send(mess);        
}



/* Funkcja odpowiedzialna za pobieranie daty w opcji 'wypożycz auto'. Wyświetla zegar z którego wybieramy date początkową i końcową */
$(document).ready(function() {
$(function() {
$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
});
});




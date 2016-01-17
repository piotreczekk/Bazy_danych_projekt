/*widok wypisuje id auta marke i model*/
create view autko as select a.id, m.marka, m.model from auto a, marka_auta m where a.marka_auta = m.id order by a.id;


/*dostepne auta spefyfikacja wersja 1  --widok--*/
create view auto_specyfikacja as select a.id, m.marka, m.model, t.typ, a.moc, a.miejsca, a.bagaznik, a.cena_dzien, a.oddzial from auto a, marka_auta m, typ_auta t where a.marka_auta=m.id and a.typ_auta = t.id and a.dostepnosc=true order by a.id;

/*niedostepne auta spefyfikacja wersja 3  --widok--*/
create view auto_specyfikacja_2 as select a.id, m.marka, m.model, t.typ, a.moc, a.miejsca, a.bagaznik, a.cena_dzien, a.oddzial from auto a, marka_auta m, typ_auta t where a.marka_auta=m.id and a.typ_auta = t.id and a.dostepnosc=false order by a.id;

/*wszystkie auta spefyfikacja wersja 2  --widok--*/
create view auto_specyfikacja_1 as select a.id, m.marka, m.model, t.typ, a.moc, a.miejsca, a.bagaznik, a.cena_dzien, a.dostepnosc, a.oddzial from auto a, marka_auta m, typ_auta t where a.marka_auta=m.id and a.typ_auta = t.id order by a.id ;

/*
select klient.id, imie, nazwisko, telefon, nr_do, miasto, wojewodztwo, ulica, nr_domu, nr_mieszkania from klient inner join adres on adres.id=klient.adres;
*/

/* ^ to samo tylko inner join*/


/* informacje o klientach -- widok */
create view klient_informacje as select k.id, k.imie, k.nazwisko, k.telefon, k.nr_do, a.miasto, a.wojewodztwo, a.ulica, a.nr_domu, a.nr_mieszkania from klient k, adres a where k.adres=a.id order by a.id;

/* informacje o oddziałach -- widok */
 create view oddzial_info as select o.id, o.kierownik, o.telefon, o.bilans, a.miasto, a.wojewodztwo, a.ulica, a.nr_domu, a.nr_mieszkania from oddzial o, adres a where o.adres = a.id order by o.id;

/* historia wypozyczeń -- widok*/
create view hist_wypo as SELECT wypozyczenie.id as id_wypo,wypozyczenie.data_pocz::date,wypozyczenie.data_kon::date, wypozyczenie.koszt, auto.id,marka_auta.marka, marka_auta.model, adres.wojewodztwo, adres.miasto, adres.ulica, adres.nr_domu, adres.nr_mieszkania, klient.nazwisko, klient.imie, klient.telefon, klient.nr_do FROM public.wypozyczenie, public.klient, public.auto, public.adres, public.marka_auta where wypozyczenie.klient = klient.id and klient.adres = adres.id and wypozyczenie.auto=auto.id and auto.marka_auta = marka_auta.id order by wypozyczenie.id using >;



/* historia wypozyczeni  do usuniecia wypozyczen -- widok*/
create view hist_wypo_1 as SELECT wypozyczenie.id as id_wypo,wypozyczenie.data_pocz::date, wypozyczenie.data_kon::date, wypozyczenie.koszt, auto.id,marka_auta.marka, marka_auta.model, adres.wojewodztwo, adres.miasto, adres.ulica,adres.nr_domu, adres.nr_mieszkania,  klient.nazwisko, klient.imie, klient.telefon, klient.nr_do FROM public.wypozyczenie, public.klient, public.auto, public.adres, public.marka_auta where wypozyczenie.klient = klient.id and klient.adres = adres.id and wypozyczenie.auto=auto.id and auto.marka_auta = marka_auta.id order by wypozyczenie.id using >;


/* koszt calkowity wypozyczenia */
select (w.data_kon::date-w.data_pocz::date)::integer*a.cena_dzien as koszt_calkowity from wypozyczenie w, auto a where w.auto=a.id;


/* funkcja zwracająca tabele raportów (średnia cena wypożyczenia, średni czas wypożyczenia, ilość wszystkich transakcji(wypożyczenia+naprawy), ilość wypożyczeń oraz ilość napraw)*/
drop function raporty();
create or replace function raporty() returns table(średnia_cena_wypożyczenia numeric(10,2), średni_czas interval, ilość_transakcji integer, ilosc_wypożyczeń integer, ilość_napraw integer) as'
begin
return query select avg(w.koszt)::numeric(10,2), avg(w.data_kon-w.data_pocz)::interval, avg(l.ilosc)::integer, avg(l.ilosc_wypo)::integer, avg(l.ilosc_napraw)::integer from wypozyczenie w, licznik_transakcji l;
end;
'language 'plpgsql';

/* Funkcja zwracająca tabele z ceną za dzień wypożyczenia danego modelu. potrzebna do funkcji odpowiedzialnej za wypożyczenie auta.*/
create or replace function cenadzien(id integer) returns table(cena integer) as'
begin
return query select cena_dzien::integer from auto where auto.id=$1;
end;
'language 'plpgsql';

/* Funkcja zwracająca tabelę zawierającą całkowity koszt wypożyczenia danego auta za dany okres czasu. Potrzebna do funkcji odpowiedzialnej za wypożyczenie auta. */
create or replace function calkoszt(id integer, d1 date, d2 date) returns table(calkowity_koszt integer) as'
begin
return query select t.cena*($3::date-$2::date)::integer from (select cena from cenadzien($1)) as t;
end;
' language 'plpgsql';

/* Funkcja odpowiedzialna za wypożyczanie auta. Najpierw sprawdza czy auto jest dostępne, następnie korzystając z 2 powyższych funkcji oblicza całkowity koszt wypożyczenia oraz dodaje rekord do tabeli wypożyczeń, na koniec update'uje pole 'dostepnosc' danego auta na false(niedostępne/wypożyczone) oraz dodaje zarobek z wypożyczenia do pola 'bilans' oddziału do którego należy wypożyczane auto */
create or replace function zamow(id integer, d1 date, d2 date, kl int) returns void as'
begin
if (select dostepnosc from auto a where a.id=$1) = true then
	insert into wypozyczenie(data_pocz,data_kon,koszt,klient,auto) values($2,$3,(select calkowity_koszt from calkoszt($1,$2,$3)),$4,$1);
	update auto set dostepnosc=false where auto.id=$1;
	update oddzial set bilans = bilans + (select calkowity_koszt from calkoszt($1,$2,$3)) from auto where auto.id = $1 and oddzial.id = auto.oddzial;

end if;

end;
' language 'plpgsql';

/* Funkcja dodająca rekord do tabeli naprawa. Dodaje rekord zawierający id naprawianego auta, id rodzaju naprawy oraz datę naprawy, następnie update'uje bilans oddziału do którego auto należy (tzn zmniejsza bilans o koszt naprawy) */
create or replace function napraw(idauta integer, naprawa integer) returns void as'
begin
insert into auto_naprawa(auto, naprawa, data_naprawy) values($1,$2,(select * from now()));
update oddzial set bilans = bilans - naprawa.koszt::integer from naprawa, auto where naprawa.id = $2 and auto.id = $1 and auto.oddzial = oddzial.id;

end;
' language 'plpgsql';


/* Historia wszystkich napraw --widok */

create view historia_napraw as select an.id_naprawy, an.data_naprawy, a.id, m.marka, m.model, n.rodzaj, n.koszt from auto a, marka_auta m, naprawa n, auto_naprawa an where a.marka_auta = m.id and a.id=an.auto and an.naprawa = n.id order by an.id_naprawy;



/* Dodaje unikalność do modeli aut tzn zarówno model jak i marka są unikalne i nie mogą się powtórzyć */
alter table marka_auta add constraint unikalny_wiersz unique (marka,model);


/* specyfikacja auta wyświetlana jako informacja o szukanym aucie--widok */
create view auto_specyfikacja_3 as select a.id,m.marka,m.model,t.typ,a.moc,a.bagaznik,a.miejsca,a.cena_dzien,a.dostepnosc,a.oddzial from auto a, marka_auta m, typ_auta t where a.typ_auta=t.id and a.marka_auta = m.id;







/* Funkcja zwracająca trigger, update'uje pole 'ilosc_wypo' odpowiedzilne za zliczanie ilości wypożyczeń za oraz 'ilosc' odpowiedzilne za zliczanie wszystkich transakcji */
create or replace function wypo_inkr() returns trigger as'
begin
update licznik_transakcji set ilosc_wypo = ilosc_wypo + 1;
update licznik_transakcji set ilosc = ilosc + 1;
return new;
end;
'language 'plpgsql';


/* Trigger odpowiedzialny za inkrementowanie licznika wypożyczeń i ilości wszystki transakcji potrzebnego do raportów*/
create trigger wypo_trig before insert on wypozyczenie for each row execute procedure wypo_inkr();


/* Funkcja zwracająca trigger, update'uje pole 'ilosc_napraw' odpowiedzilne za zliczanie ilości napraw za oraz 'ilosc' odpowiedzilne za zliczanie wszystkich transakcji */
create or replace function naprawa_inkr() returns trigger as'
begin
update licznik_transakcji set ilosc_napraw = ilosc_napraw + 1;
update licznik_transakcji set ilosc = ilosc + 1;
return new;
end;
'language 'plpgsql';

/* Trigger odpowiedzialny za inkrementowanie licznika napraw i ilości wszystki transakcji potrzebnego do raportów*/
create trigger napraw_trig before insert on auto_naprawa for each row execute procedure naprawa_inkr();


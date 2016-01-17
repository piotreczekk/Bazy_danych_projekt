/* Dane wczytywane początkwe, aby tabele nie były puste po uruchomieniu projektu */

/* wypełniam tabele adres */
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Kraków','Małopolskie','Reymonta',17,350);
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Warszawa','Mazowieckie','Marszałkowska',1,30);
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Gdańsk','Pomorskie','Słoneczna',5,1);
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Poznań','Wielkopolskie','Przybyszewskiego',100,20);


/* wypełniam tabele oddzial  */
insert into oddzial(kierownik,telefon,bilans,adres) values('Jan Kowalski','123456789',0,1);
insert into oddzial(kierownik,telefon,bilans,adres) values('Janusz Nowak','987654321',0,2);
insert into oddzial(kierownik,telefon,bilans,adres) values('Wojciech Stonoga','123456789',0,3);
insert into oddzial(kierownik,telefon,bilans,adres) values('Jerzy Kowalczyk','987654321',0,4);


/* wypełniam tabele typ_auta */
insert into typ_auta(typ) values('Hatchback');
insert into typ_auta(typ) values('Sedan');
insert into typ_auta(typ) values('Kombi');
insert into typ_auta(typ) values('Suv');
insert into typ_auta(typ) values('Bus');

/* wypełniam tabele mar */
insert into marka_auta(marka,model) values('Opel','Astra');
insert into marka_auta(marka,model) values('Volvo','XC 90');
insert into marka_auta(marka,model) values('Skoda','Octavia');
insert into marka_auta(marka,model) values('Skoda','Fabia');
insert into marka_auta(marka,model) values('Ford','Focus');
insert into marka_auta(marka,model) values('Volkswagen','Passat');
insert into marka_auta(marka,model) values('Peugeot','Boxer');
insert into marka_auta(marka,model) values('Toyota','Aygo');


/* wypełniam tabele aut */
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(105,500,5,200,true,2,3,1);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(180,500,5,250,true,2,3,1);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(230,500,5,320,true,2,3,1);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(90,300,5,200,true,1,8,2);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(250,900,9,400,true,5,7,2);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(250,500,5,350,true,2,6,3);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(180,550,5,300,true,3,5,3);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(300,500,5,400,true,4,2,4);
insert into auto(moc,bagaznik,miejsca,cena_dzien,dostepnosc,typ_auta,marka_auta,oddzial) values(150,500,5,280,true,2,1,4);



/* wypełniam tabele adres oraz klient*/
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Gdańsk','Pomorskie','Jelitkowska',2,7);
insert into klient(imie,nazwisko,telefon,nr_do,adres) values('Janusz','Januszewski','126342489','QWTR33234',5);
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Warszawa','Mazowieckie','Domaniewska',100,123);
insert into klient(imie,nazwisko,telefon,nr_do,adres) values('Jan','Janowski','758694554','QWT336234',6);
insert into adres(miasto,wojewodztwo,ulica,nr_domu,nr_mieszkania) values('Zakopane','Małopolskie','Nowotarska',41,2);
insert into klient(imie,nazwisko,telefon,nr_do,adres) values('Piotr','Piotrowski','685937586','BTF332344',7);




/* wypełniam tabele napraw */
insert into naprawa(rodzaj, koszt) values('Regeneracja turbo',1500);
insert into naprawa(rodzaj, koszt) values('Wymiana sprzęgła',800);
insert into naprawa(rodzaj, koszt) values('Wymiana klocków hamulcowych i tarcz',1000);
insert into naprawa(rodzaj, koszt) values('Komplet nowych opon',2000);
insert into naprawa(rodzaj, koszt) values('Wymiana oleju',200);

/* wypełniam tabele licznik_transakcji */
insert into licznik_transakcji values(0,0,0); 


/* wypełniam tabele auto_naprawa */
insert into auto_naprawa(auto, naprawa, data_naprawy) values(1,2,(select * from now()));
insert into auto_naprawa(auto, naprawa,data_naprawy) values(3,1,(select * from now()));
insert into auto_naprawa(auto, naprawa,data_naprawy) values(4,5,(select * from now()));
 

/* wypełniam tabele wypożyczeń */
select zamow(6,(select now()::date),'2016-01-25',2);
select zamow(3,(select now()::date),'2016-01-28',3);
select zamow(4,(select now()::date),'2016-01-25',2);
select zamow(1,(select now()::date),'2016-01-23',1);




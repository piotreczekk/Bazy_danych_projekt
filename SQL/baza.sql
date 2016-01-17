drop table adres cascade;
drop table klient cascade;
drop table oddzial cascade;
drop table auto cascade;
drop table wypozyczenie;
drop table typ_auta;
drop table marka_auta;
drop table naprawa cascade;
drop table auto_naprawa cascade;
drop table licznik_transakcji cascade;



CREATE TABLE "adres" (
  "id" SERIAL PRIMARY KEY,
  "miasto" varchar NOT NULL,
  "wojewodztwo" varchar NOT NULL,
  "ulica" varchar not null,
  "nr_domu" INTEGER NOT NULL,
  "nr_mieszkania" INTEGER,
  constraint t1 check (nr_domu > 0),
  constraint t2 check (nr_mieszkania > 0)
);

CREATE TABLE "klient" (
  "id" SERIAL PRIMARY KEY,
  "imie" varchar NOT NULL,
  "nazwisko" varchar NOT NULL,
  "telefon" varchar(9) NOT NULL,
  "nr_do" varchar(9) NOT NULL,
  "adres" INTEGER NOT NULL
);

CREATE INDEX "idx_klient__adres" ON "klient" ("adres");

ALTER TABLE "klient" ADD CONSTRAINT "fk_klient__adres" FOREIGN KEY ("adres") REFERENCES "adres" ("id");

CREATE TABLE "marka_auta" (
  "id" SERIAL PRIMARY KEY,
  "marka" varchar NOT NULL,
  "model" varchar NOT NULL
);

CREATE TABLE "naprawa" (
  "id" SERIAL PRIMARY KEY,
  "rodzaj" varchar NOT NULL,
  "koszt" integer NOT NULL
  constraint t3 check (koszt > 0)
);

CREATE TABLE "oddzial" (
  "id" SERIAL PRIMARY KEY,
  "kierownik" varchar NOT NULL,
  "telefon" varchar(9) NOT NULL,
  "bilans" INTEGER NOT NULL default 0,
  "adres" INTEGER NOT NULL
);

CREATE INDEX "idx_oddzial__adres" ON "oddzial" ("adres");

ALTER TABLE "oddzial" ADD CONSTRAINT "fk_oddzial__adres" FOREIGN KEY ("adres") REFERENCES "adres" ("id");

CREATE TABLE "typ_auta" (
  "id" SERIAL PRIMARY KEY,
  "typ" varchar NOT NULL
);

CREATE TABLE "auto" (
  "id" SERIAL PRIMARY KEY,
  "moc" INTEGER NOT NULL,
  "bagaznik" INTEGER NOT NULL,
  "miejsca" INTEGER NOT NULL,
  "cena_dzien" integer NOT NULL,
  "dostepnosc" BOOLEAN NOT NULL default true,
  "typ_auta" INTEGER NOT NULL,
  "marka_auta" INTEGER NOT NULL,
  "oddzial" INTEGER NOT NULL,
  constraint t4 check (moc > 0),
  constraint t5 check (bagaznik > 0),
  constraint t6 check (miejsca > 0),
  constraint t7 check (cena_dzien > 0)
);

CREATE TABLE "licznik_transakcji" (
  ilosc integer default 0,
  ilosc_wypo integer default 0,
  ilosc_napraw integer default 0,
  constraint t7 check (ilosc >= 0)
);

CREATE INDEX "idx_auto__marka_auta" ON "auto" ("marka_auta");

CREATE INDEX "idx_auto__oddzial" ON "auto" ("oddzial");

CREATE INDEX "idx_auto__typ_auta" ON "auto" ("typ_auta");

ALTER TABLE "auto" ADD CONSTRAINT "fk_auto__marka_auta" FOREIGN KEY ("marka_auta") REFERENCES "marka_auta" ("id") on delete cascade;

ALTER TABLE "auto" ADD CONSTRAINT "fk_auto__oddzial" FOREIGN KEY ("oddzial") REFERENCES "oddzial" ("id") on delete cascade;

ALTER TABLE "auto" ADD CONSTRAINT "fk_auto__typ_auta" FOREIGN KEY ("typ_auta") REFERENCES "typ_auta" ("id") on  delete cascade;

CREATE TABLE "auto_naprawa" (
  "id_naprawy" SERIAL PRIMARY KEY,
  "auto" INTEGER NOT NULL,
  "naprawa" INTEGER NOT NULL,
  "data_naprawy" DATE NOT NULL
);

CREATE INDEX "idx_auto_naprawa__auto" ON "auto_naprawa" ("auto");

CREATE INDEX "idx_auto_naprawa__naprawa" ON "auto_naprawa" ("naprawa");

ALTER TABLE "auto_naprawa" ADD CONSTRAINT "fk_auto_naprawa__auto" FOREIGN KEY ("auto") REFERENCES "auto" ("id");

ALTER TABLE "auto_naprawa" ADD CONSTRAINT "fk_auto_naprawa__naprawa" FOREIGN KEY ("naprawa") REFERENCES "naprawa" ("id");

CREATE TABLE "wypozyczenie" (
  "id" SERIAL PRIMARY KEY,
  "data_pocz" TIMESTAMP NOT NULL,
  "data_kon" TIMESTAMP NOT NULL,
  "koszt" integer NOT NULL,
  "klient" INTEGER NOT NULL,
  "auto" INTEGER NOT NULL,
  constraint t8 check (data_kon > data_pocz),
  constraint t9 check (koszt > 0),
  constraint t10 check (data_pocz = now()::date)
 
);

CREATE INDEX "idx_wypozyczenie__auto" ON "wypozyczenie" ("auto");

CREATE INDEX "idx_wypozyczenie__klient" ON "wypozyczenie" ("klient");

ALTER TABLE "wypozyczenie" ADD CONSTRAINT "fk_wypozyczenie__auto" FOREIGN KEY ("auto") REFERENCES "auto" ("id");

ALTER TABLE "wypozyczenie" ADD CONSTRAINT "fk_wypozyczenie__klient" FOREIGN KEY ("klient") REFERENCES "klient" ("id")



\i zapytania.sql
\i dane.sql

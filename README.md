# Shramba na oddaljnem strežniku

## Namen
Cilj tega projekta je ustvariti preprosto dostopno shrambo na domačem strežniku, ki omogoča nalaganje in prenašanje datotek iz katere koli naprave.

## Zasnova

### Main.php
Naslovna stran, ki omogoča uporabniku upravljanje shrambe. Razdeljena je na dva glavna dela:

![diagram.png](https://github.com/NPodrekar/Projekt/blob/main/diagram.png)

- **1. izbor in nalaganje datotek**

  Uporabnik lahko s klikom na gumb "Izberi datoteko" odpre shrambo naprave iz katere lahko izbere ENO datoteko. Z gumbom "Naloži" potrdi izbiro in datoteko pošlje na strežnik, s čimer je preusmerjen na podstran "Upload.php".

- **2. pregled naloženih datotek**

  V pregledu datotek so razvrščene povezave do datotek v shrambi strežnika. S klikom na njih, je uporabnik pozvan za vnos prej določenega dešifrirnega ključa. V primeru pravilnega ključa bo preusmerjen na "download.php".

### upload.php
Podstran vsebuje PHP skripto, ki z Advanced Encryption Standard (AES) šifrira datoteko preden jo shrani na strežnik. Trenutno je ključ za šifriranje shranjen znotraj PHP kode, vendar bi se tega v prihodnosti rad znebil.

### download.php
Podstran prek POST dobi dešifrirni ključ in ime datoteke, ki jo uporabnik želi prenesti. Uporaba POST metode se uporablja, da se izogne vidnosti ključa in imena datoteke v URL-ju (GET). Postopek dešifrira tudi preveri ustreznost poslanega ključa. V primeru napake se javi napaka in prenos se ne izvede.

## Orodja

### XAMPP 
- Apache HTTP strežnik

### Ngrok 
- Storitev, ki omogoči vzpostavitev tunela med javnim URL-jem Ngrok strežnikov in localhost. S tem programom se izognemo potrebi po odpiranju portov v domačem omrežju. Glavni slabosti sta omejitev istočasnih povezav in spreminjanje naslova ob vnovičnih zagonih.

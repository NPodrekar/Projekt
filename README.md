# Shramba na oddaljnem strežniku

## Namen
Cilj tega projekta je ustvariti preprosto dostopno shrambo na domačem strežniku, ki omogoča nalaganje in prenašanje datotek iz katere koli naprave.

## Zasnova
### Main.php
Naslovna stran, ki omoči uporabniku upravljanje shrambe. Razdeljena je na dva glavna dela


![diagram.png](https://github.com/NPodrekar/Projekt/blob/main/diagram.png)

**1. izbor in nalaganje datotek**

Uporabnik lahko s klikom na gumb "Izberi datoteko" odpre shrambo naprave iz katere lahko izbere ENO datoteko, z gumbom "Naloži" pa izbiro potrdi in datoteko pošlje na strežnik s tem je preusmerjen na podstran "Upload.php"

      
**2. pregled naloženih datotek**

V pregledu datotek so razvrščene povezave do datotek v shrambi strežnika, s klikom na njih, je uporabnik pozvan za vnos prej določenega dešifrirnega ključa v primeru da je pravilen bo preusmerjen na "download.php"

  
 


### upload.php
Podstran vsebuje php skript, ki z Advanced Encryption Standard (AES) šifrira datoteko preden jo dejansko shrani na strežnik. Trenutno je ključ za šifriranja shranjen znotraj php kode vendar bi se v prihodnosti tega rad znebil.

### download.php
Podstran prek POST dobi dešifrirni ključ in ime datoteke, ki jo uporabnik želi prenesti. Razlog za uporabo POST je, da se znebimo uporabnikovega ključa in imena datoteke, ki bi bila vidna v URL če bi uporabili GET
Postopek dešfriranja preveri tudi, če je ključ, ki ga je posredoval uporabnik ustrezen, v primeru da ni javi napako in prenos se ne izvede.

## Orodja
### XAMPP 
Apache HTTP strežnik
### Ngrok 
Storitev, ki omogoči vzpostavitev tunela med javnim URL Ngrok strežnikov in localhost. S tem programom se izognemo potrebi po odpiranju portov v domačem omrežju. Glavni slabosti sta omejitev istočasnih povezav in spreminjanje naslova ob vnovičnih zagonih.



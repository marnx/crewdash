## Installatie  
###### Benodigde programma's
* [GIT Bash](https://git-for-windows.github.io/)
* [XAMPP](https://www.apachefriends.org/download.html)
* [Composer](https://getcomposer.org/download/)

Clone de bestanden uit de repository naar de gewenste locatie op je pc. Nu zijn er nog enkele stappen die uitgevoerd moeten worden:  
1. Ga naar je PhpMyAdmin en maak een database genaamd: `oos_elearning` aan.  
2. Open het `.env` bestand en zorg dat `DB_USERNAME` en `DB_PASSWORD` overeenkomen met jouw database.  
3. Laat dan het volgende commando uitvoeren: ```php artisan key:generate```  
4. Laat dan het volgende commando uitvoeren: ```php artisan migrate```  
5. Open GIT Bash in\de map van de applicatie en voer de volgende commando's uit:  
```Php artisan db:seed```  
6. De applicatie kan je dan uitvoeren met ```php artisan serve```  
7. Je kan dan inloggen met de volgende inloggegevens.  

| |Beheerder|Gebruiker|
| --|--|--|
|Email|admin@admin.admin|user@user.user|
|Employee number|1|2|
|Password|123456|123456|
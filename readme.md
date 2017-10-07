# Bok applikation

## Utvecklades i
- Laravel 5.5
- PHP 7
- Mysql 5.6.25


## Användning
1. Ladda ner,
2. Skapa databas och koppla
3. Kör migrations "php artisan migrate" i terminalen, alternativt importera db.sql
4. Använd applikationen


## Uppgift
En applikation skall skapas för att hantera olika bokpaket. I varje paket ska man kunna lägga till en eller flera böcker och även kunna redigera paket som att lägga till och ta bort böcker ur paketet, samt sätta pris.

Böckerna behöver bestå av ett namn och ett pris. Paketets pris är summan av de ingående böckernas priser om inte ett särskilt paketpris på paketet har angivits.

Den första vyn man kommer till ska bestå av en lista med alla bokpaket där man också får tillgång knappar/menyval för att lägga till böcker/bokpaket. Det ska också gå att redigera böcker och bokpaket.

Att lägga till bokpaket eller böcker till ett bokpaket samt ta bort får inte ske genom ett vanligt html formulär som laddar om sidan, utan måste ske genom t.ex. JavaScript (AJAX).

Krav på programmeringsspråk är PHP med MySQL databas.
Ni skickar sedan in programmeringskoden/databasen till oss där vi sedan granskar arbetet.





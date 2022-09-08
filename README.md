# Autocat
Backend school project made with Laravel & AJAX
Created in a team together with [lpoelmans](https://github.com/lpoelmans) and [jarib2409](https://github.com/jarib2409)

![autoCatLogo_horizontaal_grey](https://user-images.githubusercontent.com/91475147/173594414-f16b46a4-457f-4498-8297-c7c1086d6640.png)

**This project is only available in Dutch.**

## Project clonen

1. Clone de repo in een lokale folder

2. Via de command line in de terminal: typ `cd autocat`

3. Composer dependencies installeren met `composer install` in de terminal.

4. npm dependencies installeren met `npm install` in de terminal.

5. Genereer een kopie van de .env file met `cp .env.example .env` in de terminal.
  	- Als de .env file niet standaard aanwezig is, maak een nieuwe file aan in de autocat folder en noem deze `.env`
  	- Copy-paste volgende code van volgende [link](https://github.com/laravel/laravel/blob/master/.env.example) in de .env file
6. Genereer app-encryptie key met `php artisan key:generate` in de terminal

7. Maak een nieuwe database aan met een database programma

8. Vul in de .env file volgende zaken in: DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, en DB_PASSWORD

9. Migreer de database met `php artisan migrate` en seed ze met `php artisan db:seed`

10. Applicatie is nu klaar voor gebruik.

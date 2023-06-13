<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### קרא אותי!

Welcome the the Boostapp-Laravel Demo Mission.
The start the application please follow the instructions Below

1. Make sure your system has: PHP , Composer , Node.js & a Database and that your Code Editor supports php.blade.
- Also make sure your System Environment Variables has a path for your PHP directory and the php.ini has "extension=zip" without ";".

2. Download or Clone the app's directive from [GitHub](https://github.com/Ruinous7/laravel-demo-mission).

3. Run composer install
   ```sh
   composer install
   ```
4. Create .env
   ```sh
   cp .env.example .env
   ```
5. Generate key
   ```sh
   php artisan key:generate
   ```
6. Run npm install
   ```sh
   npm install
7. Run npm run dev
   ```sh
   npm run dev
   ```
8. Run migration files (if you're using mySQL, if not please connect your DB to the application first in the .env file)
   ```sh
   php artisan migrate
   ```
9. Run seeders
   ```sh
   php artisan db:seed
   ```
10. Run on your localhost
   ```sh
   php artisan serve
   ```

## And your application is ready to run

# My Reflection on the mission;

I had to learn what is MVC , as my background in programming came from JavaScript, it was strange for me to work with that and i had to learn how to dynamics of the Model, View and Controller work, and how to router renders my views.

After migrating the database and seeding the "Products" and their counterpart table "Cart_items" , I've Realized that the store that i'm supposed to build is a SPA and that the normal MVC dynamics just wont work for the purpose of the mission and i've discoverd Livewire , which brings a more JavaScript SPA feel for developing the mission.

# What I need to improve;

I need to layout the site better with relative parent and child components, the css needs some more work.
I also tried implementing a "Cart Component" for the "Cart_items" table but when i called that component functions they triggered too slow for my liking, Basically because every time i change for example the product's quantity by clicking it from the Store component , it would take some time from the event listener to tell the Cart component to trigger a function, send a message to the server and return it to me in the client, which in my JavaScript programming this wont be a problem because i have an inner state which solves this problem.

# Thanks for Reading !


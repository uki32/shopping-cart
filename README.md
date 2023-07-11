To run the app

download the zipped tag, unpack to your desired location, in cmd run commands:
composer install<br>
php artisan migrate<br>
php artisan db:seed to test-fill the migrated database.<br>
php artisan serve<br>

home page url should contain '/products' route in the end of url e.g. 'http://127.0.0.1:8000/product'

this is just an example of my basic Laravel knowledge helped by tutorial.
i also have to mention that technologies used in tutorial were Laravel 5.2 and Bootstrap 3, 
and that my app was built in Laravel 10 and bootsrtap 5.

app has the ability of registering new users and logging in those that are already registered.
logged user can add products into shopping cart and also make an order of products that are inside cart.

also user has the ability to view his profile page that contains orders that he made in the past, and also user can logout.
as i said, it's just a simple project made for fun and in purposes of learning.

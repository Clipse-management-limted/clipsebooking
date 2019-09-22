<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>



## Online upload
Rename server.php to index.php and text to .htaccess

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)/$ /$1 [L,R=301]

RewriteCond %{REQUEST_URI} !(\.css|\.js|\.png|\.jpg|\.gif|robots\.txt)$ [NC]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !^/public/
RewriteRule ^(css|js|images)/(.*)$ public/$1/$2 [L,NC]
##  OR


You have two methods available, one requiring ssh access. Under no circumstances do you put your entire Laravel directory into the public_html directory.
SSH Access
If you have SSH access you'll want to do the following;
* Log into your account and go to your home directory cd ~
* Delete the public_html directory
* Now you want to upload your Laravel app to ~/laravel
* Now you need to recreate public_html as a symlink cd ~ && ln -s laravel/public public_html
No SSH Access
If you don't have SSH access you'll want to do the following;
* Upload your laravel installation to somewhere like ~/laravel (above the public_html)
* Copy the contents of the ~/laravel/public directory to public_html
* Change the paths below to match your new destination
* require DIR.'/../laravel/vendor/autoload.php';
* $app = require_once DIR.'/../laravel/bootstrap/app.php';
Your new ~/public_html/index.php should look like the following;
<?php


/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package Laravel
 * @author Taylor Otwell <taylor@laravel.com>
 */


define('LARAVEL_START', microtime(true));


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/


require DIR.'/../laravel/vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/


$app = require_once DIR.'/../laravel/bootstrap/app.php';


/*
|--------------------------------------------------------------------------
| Redefine the PUBLIC FOLDER
|--------------------------------------------------------------------------
| DANIEL ADDED:
| This enables http requests to pick up the new path using public_path() function defined in the helpers file
|
|
*/


$app->bind('path.public', function() {
  return DIR;
});


/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/


$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


$response = $kernel->handle(
     $request = Illuminate\Http\Request::capture()
);


$response->send();


$kernel->terminate($request, $response);


If you want artisan serve to recognise your new public path, add this line of code in artisan file


$app = require_once DIR.'/../laravel/bootstrap/app.php';
$app->bind('path.public', function() {
  return DIR.'/../public_html'; OR WHATEVER YOUR PUBLIC FOLDER IS CALLED AND ITS RELATIVE POSITION TO ARTISAN FILE
});


Then in server.php change the path to reflect your public folder (in this case public_html directory a level up from server.php)


if ($uri !== '/' && file_exists(__DIR__.'/../public_html'.$uri)) {
     return false;
}
require_once DIR.'/../public_html/index.php';








While the above method works for requests coming from HTTP, it will not work for artisan. (unless you have applied the artisan footnote)
If you need artisan to know your custom public path, you need to extend Laravel main Application class. I know it sounds scary, but it's actually very simple.
All you need to do is followi
ng:
Step 1: In the file: bootstrap/app.php change the very first declaration of $app variable
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);
to reflect your own custom Application class:
$app = new App\Application(
    realpath(__DIR__.'/../')
);
Step 2: Define your custom Application class somewhere. For example in app/Application.php
<?php namespace App;


class Application extends \Illuminate\Foundation\Application
{
}
Congrats! You have extended Laravel core Application class.
Step 3: Overwrite the publicPath method. Copy and paste Laravel original method to your new class and change it to your needs. In my particular case I did like this:
public function publicPath()
{
    return $this->basePath.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public_html';
}
That's it! You can overwrite any method in Application class the same way.




## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

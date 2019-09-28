<?php
use App\Models\Tickets;
use App\Models\User_tickets;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth'])->group(function(){
//   Route::get('categories', 'CategoryController@index')->name('categories');
//   Route::get('categories/{id}', 'CategoryController@show');
//   Route::get('tags','TagController@index')->name('tags');
//   Route::get('tags/{id}','TagController@show');
//   Route::get('posts','PostController@index')->name('posts');
//   Route::get('posts/{id}','PostController@show')->name('show-post');
//   Route::get('new-post','PostController@newpost')->name('add-post');
//   Route::post('new-post','PostController@store')->name('save-post');
//   Route::get('comments','CommentController@index')->name('comments');
//   Route::get('comments/{id}','CommentController@show');
//   Route::post('categories','CategoryController@store')->name('save-category');
//
// });
// Route::get('test', function () {
//   $post =User_tickets::find(1);
//   return $post->author;
//    // return new App\Http\Resources\CategoriesResource($post);
//
// });

Route::get('/',  'EventsController@welcome')->name('home');
Route::get('/contact-us','EventsController@contactus')->name('contact-us');
Route::post('/contact','EventsController@sendEmail')->name('contact');
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/food', 'FoodController@index')->name('food');
Route::get('/packing', 'PackingController@index')->name('packing');
Route::get('/tickets', 'TicketsController@index')->name('tickets');
Route::get('/ticket/{id?}', 'TicketsController@load_form')->name('ticket');
Route::post('/BuyTicket', 'TicketsController@createPackage')->name('buy_ticket');
Route::post('/BuyFood', 'FoodController@orderFood')->name('buy_food');
Route::get('qr-code-g','TicketsController@buildQrCode')->name('qr-code-g');
Route::post('/pay', 'TicketsController@redirectToGateway')->name('pay');
Route::get('/callback', 'TicketsController@handleGatewayCallback');
Route::get('/callback2', 'TicketsController@handleGatewayCallback2');
Route::get('/payment', 'TicketsController@paymentpage')->name('payment');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::middleware(['auth'])->group(function(){
Route::get('/verify', 'TicketsController@confirm')->name('verify');
Route::post('/create_food_item', 'HomeController@createFood')->name('create_food_item');
Route::get('/create-Food', 'HomeController@showFood')->name('create-Food');
Route::get('/create-Events', 'HomeController@showEvents')->name('create-Events');
Route::post('/create_event_item', 'HomeController@createEvent')->name('create_event_item');
Route::post('/tickets_type', 'HomeController@createEvent_Tickets')->name('create_event_ticket');
});

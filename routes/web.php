<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('messages',function(){
  return App\Message::with('user')->orderBy('id','DESC')->take(3)->get();
});

Route::get('/pusher', function() {
  $user = Auth::user();
 $message  = $user->message()->create([
   'message'=>"test"
 ]);

    event(new App\Events\MessagePosted($user,$message));
    return "Event has been sent!";
});


Route::post('sendMsg',function(){
   $user = Auth::user();
  $message  = $user->message()->create([
    'message'=>request()->get('message')
  ]);
  $data['message'] = request()->get('message');
  $data['user'] = $user->name;

  $options = array(
  'cluster' => 'eu',
  'encrypted' => true
  );
  $pusher = new Pusher(
  '554f99af0fcf4d4ab71d',
  'c63e35f68d7d98c60b55',
  '318780',
  $options
  );


  $pusher->trigger('my-channel', 'my-event', $data);

event(new App\Events\MessagePosted($user, $message));
  return ['status'=>'ok'];
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

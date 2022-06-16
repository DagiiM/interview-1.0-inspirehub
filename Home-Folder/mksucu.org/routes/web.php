<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\{
            User\UserController,
            User\UserMinistryController,
            User\UserRoleController,
            WelcomeController,
            DashboardController,
            Library\LibraryController,
            Library\LibraryEbookController,
            Ministry\MinistryChatController,
            Video\VideoController,
            Chat\ChatController,
            Ministry\MinistryController,
            Ministry\MinistryUserController,
            Ministry\MinistryEmailController,
            Gallary\GallaryController,
            Event\EventController,
            Ability\AbilityController,
            Role\RoleController,
            Ebook\EbookController,
            Ebook\EbookLibraryController,
            Theme\ThemeController,
            Contact\ContactController,
            Image\ImageController,
            Social\SocialController,
            System\SystemController,
            Service\ServiceController,
            Email\EmailController,
            Storage\StorageController
          };

use App\Models\System;
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

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('welcome/libraries',[WelcomeController::class,'libraries'])->name('libraries');

Route::get('welcome/ministries',[WelcomeController::class,'ministries'])->name('ministries');

Route::get('welcome/events',[WelcomeController::class,'events'])->name('events');

Route::get('welcome/socials',[WelcomeController::class,'socials'])->name('socials');

Route::get('welcome/services',[WelcomeController::class,'services'])->name('services');

Route::get('welcome/themes',[WelcomeController::class,'themes'])->name('themes');

Route::get('welcome/images',[WelcomeController::class,'images'])->name('images');

Route::get('welcome/contacts',[WelcomeController::class,'contacts'])->name('contacts');

Route::get('welcome/executives',[WelcomeController::class,'executives'])->name('executives');


Route::get('/install',function(){
  try
  {
    if(System::count())
    {
      return view('welcome');
    }

    else
    {
      return view('system.create');
    }
  }
  catch(Exception $exception)
  {
    return view('system.install');
  }
});

Route::get('app/install',function(){
  try{
    Artisan::call('migrate');
  } catch(Exception $x){
    return 2;
  }
  return redirect()->route('welcome');
})->name('system');

Route::resource('users',UserController::class);

Route::get('users/restore/{id}',[UserController::class,'restore'])->name('users.restore');

Route::get('users/mobile',[UserController::class,'mobileChecker'])->name('mobile');

Route::get('users/email',[UserController::class,'emailChecker'])->name('email');

Route::resource('videos',VideoController::class);

Route::middleware(['auth'])->group(function () {

  Route::resource('systems',SystemController::class,['only'=>['create','update','store','edit']]);

  Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

  Route::resource('users.ministries',UserMinistryController::class,['only'=>['index','create','store','destroy']]);
  Route::resource('users.roles',UserRoleController::class,['only'=>['index','create','store','destroy']]);

  Route::resource('libraries',LibraryController::class);
  Route::resource('libraries.ebooks',LibraryEbookController::class,['only'=>['index','create','store']]);

  Route::resource('ebooks',EbookController::class);
  Route::resource('ebooks.libraries',EbookLibraryController::class,['only'=>['index']]);

  Route::resource('ministries.chats',MinistryChatController::class,['only'=>['index','show','store','destroy']]);

  Route::resource('chats',ChatController::class);

  Route::resource('services',ServiceController::class);

  Route::resource('gallaries',GallaryController::class);

  Route::resource('contacts',ContactController::class);

  Route::resource('ministries',MinistryController::class);
  Route::resource('ministries.users',MinistryUserController::class,['only'=>['index']]);
  Route::resource('ministries.emails',MinistryEmailController::class,['only'=>['create']]);
  Route::get('ministries/{ministry}/users/member-pdf',[MinistryUserController::class,'pdf']);

  Route::resource('notifications',NotificationController::class);

  Route::resource('abilities',AbilityController::class);

  Route::resource('roles',RoleController::class);

  Route::resource('events',EventController::class);

  Route::resource('emails',EmailController::class);
  Route::post('/emails/reminder',[EmailController::class,'reminder'])->name('reminder');

  Route::resource('themes',ThemeController::class);

  Route::resource('socials',SocialController::class);

  Route::resource('images',ImageController::class);
  Route::get('maintenance',[StorageController::class,'index']);

});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('users/{$user}',[UserController::class,'show'])->name('profile');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('chatsx',function(){

  $fp = fsockopen("www.9486-102-222-146-17.ngrok.io", 80, $errno, $errstr, 20);
  if (!$fp) {
    echo "$errstr ($errno)<br>";
  } 
  else {
    $out = "GET / HTTP/1.1\r\n";
    $out .= "Host: www.9486-102-222-146-17.ngrok.io\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
      echo fgets($fp, 128);
    }
    fclose($fp);
  }
});

require __DIR__.'/auth.php';

Route::fallback(function(){
  return "Please Check the Link and Refresh.";
});

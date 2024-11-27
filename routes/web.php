<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FireBaseController;
use App\Http\Controllers\MailCoashController;
use App\Http\Controllers\OpenAiController;

Route::controller(MailCoashController::class)->group(function () {

    Route::get('data-list', 'index')->name('subscribers-list');
    Route::get('user', 'getUser')->name('getUser');
    // Route::get('campaigns', 'getCampaigns')->name('getCampaigns');
    Route::get('sends', 'getSends')->name('getSends');
    Route::get('sendEmail', 'sendEmail')->name('sendEmail');
    Route::get('subscriber', 'subscriber')->name('subscriber');
    Route::get('search-subscribers', 'searchSubscribers')->name('searchSubscribers');
    Route::get('confirm-subscriber', 'confirmSubscriber')->name('confirmSubscriber');
    Route::get('unsubscribe-subscriber', 'unsubscribeSubscriber')->name('unsubscribeSubscriber');
    Route::get('delete-subscriber', 'deleteSubscriber')->name('deleteSubscriber');
    Route::get('campaign', 'campaign')->name('campaign');
    Route::get('email-list', 'emailList')->name('emailList');

});
// open ai
Route::controller(OpenAiController::class)->group(function () {

    Route::get('open-ai', 'index')->name('openAi');
    
    


});
// firebase
Route::controller(FireBaseController::class)->group(function () {

    Route::get('firebase', 'index')->name('fireBase');
    
    Route::post('verify', 'verify')->name('verify');


});
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    
    $response = Http::withToken("GNjA7Db3UObJPeUaVYneJieu5jzZu0peLdjAy8Kda5460535")
         ->get("https://mohamed-meskine.mailcoach.app/api/sends");

         $sents = $response->json();

    return Inertia::render('Dashboard', [
        "sents"=>$sents
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

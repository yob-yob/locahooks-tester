<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/webhook', [WebhookController::class, 'index'])->name('webhook.form');
Route::post('/submit', [WebhookController::class, 'submit'])->name('webhook.submit');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;


Route::get('/', [WebhookController::class, 'index'])->name('webhook.form');
Route::post('/submit', [WebhookController::class, 'submit'])->name('webhook.submit');
Route::post('/webhook/handler', [WebhookController::class, 'handleWebhook'])->name('webhook.handler');
Route::get('/quotes', [WebhookController::class, 'listQuotes'])->name('webhook.quotes');

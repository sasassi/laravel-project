<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InfluencerEventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::prefix('influencer')->group(function () {
    Route::get('/events', [InfluencerEventController::class, 'index'])->name('influencer.events.index');
    Route::get('/events/create', [InfluencerEventController::class, 'create'])->name('influencer.events.create');
    Route::post('/events', [InfluencerEventController::class, 'store'])->name('influencer.events.store');
    Route::get('/events/{id}/edit', [InfluencerEventController::class, 'edit'])->name('influencer.events.edit');
    Route::put('/events/{id}', [InfluencerEventController::class, 'update'])->name('influencer.events.update');
    Route::delete('/events/{id}', [InfluencerEventController::class, 'destroy'])->name('influencer.events.destroy');
});

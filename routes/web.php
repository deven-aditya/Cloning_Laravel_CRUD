<?php 
 
use App\Http\Controllers\EventController; 
use App\Http\Controllers\TicketController; 
use Illuminate\Support\Facades\Route; 
 
 
Route::get('/', function () { 
    return view('dashboard'); 
}); 
 
Route::resource('/event', EventController::class); 
Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::resource('/ticket', TicketController::class);
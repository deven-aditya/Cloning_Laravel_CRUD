<?php 
 
use App\Http\Controllers\EventController; 
use App\Http\Controllers\TicketController; 
use Illuminate\Support\Facades\Route; 
 
 
Route::get('/', function () { 
    return view('dashboard'); 
}); 
 
Route::resource('/event', EventController::class); 
Route::resource('/ticket', TicketController::class);
<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Ticket; 
use Illuminate\Http\Request; 
 
class TicketController extends Controller 
{ 
    /** 
    * index 
    * 
    * @return void 
    */ 
    public function index() 
    { 
        $tickets = Ticket::latest()->paginate(5);  
        return view('ticket.index', compact('tickets')); 
    } 
} 
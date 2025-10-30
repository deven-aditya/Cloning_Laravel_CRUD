<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Ticket; 
use Illuminate\Http\Request; 
use Illuminate\Foundation\Validation\ValidatesRequests;

class TicketController extends Controller 
{ 
    use ValidatesRequests;
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

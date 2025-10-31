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

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_event' => 'required',
            'ticket_type' => 'required',
            'price' => 'required|decimal'
        ]);

        Ticket::create([
            'id_event' => $request->id_event,
            'ticket_type' => $request->ticket_type,
            'price' => $request->price
        ]);

        try {
            return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->route('ticket.index')->with(['error' => $e->getMessage()]);
        }
    }

    
} 

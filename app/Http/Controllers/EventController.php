<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);
        
        return view('event.index', compact('events'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('event.create');
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
            'event_name' => 'required',
            'location'   => 'required',
            'quota'      => 'required|numeric'
        ]);

        Event::create([
            'event_name' => $request->event_name,
            'location'   => $request->location,
            'quota'      => $request->quota
        ]);

        try {
            return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (Exception $e) {
            return redirect()->route('event.index')->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('event'));
    }

    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        
        $this->validate($request, [
            'event_name' => 'required',
            'location'   => 'required',
            'quota'      => 'required|numeric'
        ]);

        $event->update([
            'event_name' => $request->event_name,
            'location'   => $request->location,
            'quota'      => $request->quota
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        
        $event->delete();

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
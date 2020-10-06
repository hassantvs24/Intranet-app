<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Event;

class EventController extends BaseController
{
    public function index()
    {
        $events = Event::all();


        if (is_null($events)) {
            return $this->sendError('Events not found.');
        }

        return response()->json($events->toArray(), 200);

        return $this->sendResponse($events->toArray(), 'events retrieved successfully.');
    }


    public function store(Request $request)
    {
        $event             = new Event();
        $event->title      = $request->title;
        $event->board_id   = $request->board_id;
        // $event->start_date = $request->start_date;
        $event->start = $request->start_date;
        // $event->end_date   = $request->end_date;
        $event->end  = $request->end_date;
        $event->details    = $request->details;
        $event->save();
        if (is_null($event)) {
            return $this->sendError('Events not found.');
        }

        return $this->sendResponse($event->toArray(), 'events added successfully.');
    }

    public function show($id)
    {
        $event = Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Events not found.');
        }

        return $this->sendResponse($event->toArray(), 'events retrieved successfully.');
    }

    public function update(Request $request, $id)
    {
        $event             = Event::find($id);
        $event->title      = $request->title;
        $event->board_id   = $request->board_id;
        // $event->start_date = $request->start_date;
        $event->start = $request->start_date;
        // $event->end_date   = $request->end_date;
        $event->end   = $request->end_date;
        if( $request->details ) {
            $event->details = $request->details;
        }
        $event->save();
        if (is_null($event)) {
            return $this->sendError('Events can not be updated.');
        }

        return $this->sendResponse($event->toArray(), 'events updated successfully.');
    }

    public function destroy($id)
    {
        $event =  Event::findOrFail($id);
        $event->delete();
        return $this->sendResponse($event->toArray(), 'events deleted successfully.');
    }

    public function eventbyBoard($board_id) {
        $events = Event::where( 'board_id', $board_id )->get();

        return response()->json($events->toArray(), 200);
    }
}

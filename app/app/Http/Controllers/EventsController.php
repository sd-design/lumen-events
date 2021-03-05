<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class EventsController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    

     public function index()
     {
        $response = Http::withHeaders([
            self::getToken()
        ])->get('https://leadbook.ru/test-task-api/shows');
        $shows = json_decode($response);
        return view('shows', ['title' => 'Список мероприятий','shows' => $shows]);

     }
    
    public function events($id)
    {
        $response = Http::withHeaders([
            self::getToken()
        ])->get('https://leadbook.ru/test-task-api/shows/'.$id.'/events');
        $events = json_decode($response);
        return view('events', ['title' => 'Список событий мероприятия','showId'=>$id,'events' => $events]);

    }
    public function places($id)
    {
        $response = Http::withHeaders([
            self::getToken()
        ])->get('https://leadbook.ru/test-task-api/events/'.$id.'/places');
        $places = json_decode($response);
        return view('places', ['title' => 'Список мест события #'.$id,'places' => $places, 'eventId'=>$id, 'link_event'=>'']);

    }
    public function reserve($id)
    {
        $response = Http::withHeaders([
            self::getToken()
        ])->get('https://leadbook.ru/test-task-api/events/'.$id.'/places');
        $places = json_decode($response);
        return view('places', ['title' => 'Список мест события #'.$id,'places' => $places, 'eventId'=>$id, 'link_event'=>'']);

    }
}
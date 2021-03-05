<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
   
    public function hello(){
        $answer =  "hello from controller";
        return (new Response($answer, 200))
        ->header('Content-Type', 'text/plain');
        
    }

    public function reserve(Request $request)
    {
        
        $eventId= $request->input('eventId');
        $name = $request->input('name');
        $places = $request->input('places');
        $remoteResponse = Http::withHeaders([
            $this->getToken()
        ])->asForm()->post('https://leadbook.ru/test-task-api/events/'.$eventId.'/reserve', [
            'name' => $name,
            'places' => $places,
        ]
    );
    $remoteResponse = json_decode($remoteResponse);
        $response = array('name' => $name, 'places'=>$places, 'eventId'=> $eventId, 'response'=> true, 'result' => $remoteResponse);
        return (new Response($response, 200))
        ->header('Content-Type', 'application/json');

        //
    }


    public function test()
    {
        $eventId = 71;
        $name = 'Alex';
        $places = '[1,2,3]';
        $response = Http::withHeaders([
            $this->getToken()
        ])->asForm()->post('https://leadbook.ru/test-task-api/events/'.$eventId.'/reserve', [
            'name' => $name,
            'places' => $places,
        ]
    );
    $remoteResponse = json_decode($response);
        return view('test', ['title' => 'Test reserve', 'response' => $remoteResponse]);

    }
  
}
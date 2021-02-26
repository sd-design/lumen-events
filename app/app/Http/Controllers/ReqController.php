<?php

namespace App\Http\Controllers;

use App\Req;



class ReqController extends Controller
{
    /**
     * 
     */
    public function update()
    {
        //$client = new \GuzzleHttp\Client();
        $response =  $client->request('GET', 'http://localhost:3000/options');
        $content =  $response->getBody();
        return $content;
    }
}
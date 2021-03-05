<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    protected $token = array('Authorization' => 'token=f72e02929b79c96daf9e336e0a5cdb8059e60685');

    public function getToken(){
        return $this->token;
    }
}

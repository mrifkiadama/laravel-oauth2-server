<?php

namespace App\Models;

use Laravel\Passport\Client;

class PassportClient extends Client
{
    public function skipAuthorization()
    {
        //  false or null will skip the authorization
        return false;
    }  
}

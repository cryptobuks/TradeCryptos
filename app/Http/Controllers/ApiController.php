<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\PayPal;
use Illuminate\Support\Facades\Input;

use DB;


use App\User;

use GuzzleHttp\Client;


class ApiController extends Controller
{
 
    public function getCryptoNames()
    {
        $cryptonames = DB::getSchemaBuilder()->getColumnListing('cryptos');

        array_pop($cryptonames);
        // removes  last value (user_id)
        return $cryptonames; 
    }

    public function getDashboard()
    {
        $client = new Client(); //GuzzleHttp\Client

        $response = $client->get('https://api.coinmarketcap.com/v2/ticker/?limit=100&sort=rank&convert=EUR');

        return $response->getBody();

    }

}

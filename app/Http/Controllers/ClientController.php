<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Client;

class ClientController extends Controller
{
    public function store(ClientRequest $req){
        $client = new Client();
        $client->name = $req->name;
        $client->email = $req->email;
        $client->phone = $req->phone;
        $client->save();

        return json_encode(Client::get(), JSON_UNESCAPED_UNICODE);
    }
}

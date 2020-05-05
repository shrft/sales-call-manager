<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Jwt\ClientToken;

class TwilioTokenController extends Controller
{

    public function __construct(ClientToken $clientToken)
    {
        $this->clientToken=$clientToken;
    }

    /**
     * Create a new capability token
     *
     * @return \Illuminate\Http\Response
     */
    public function newToken(Request $request)
    {
        $applicationSid = config('twilio.applicationSid');
        $this->clientToken->allowClientOutgoing($applicationSid);
        $token = $this->clientToken->generateToken();
        return response()->json(['token' => $token]);
    }
    //


}

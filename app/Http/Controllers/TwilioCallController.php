<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;
use Illuminate\Support\Facades\Log;

class TwilioCallController extends Controller
{
    //
    /**
     * Process a new call
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newCall(Request $request)
    {
        $response = new VoiceResponse();
        $callerIdNumber = config('twilio.number');

        $dial = $response->dial(null, [
            'callerId'=>$callerIdNumber,
            'record' => 'record-from-answer-dual'
             ]);
        $phoneNumberToDial = $request->input('phoneNumber');
        $dial->number($phoneNumberToDial);
        Log::info('calling to a number:' . $phoneNumberToDial);

        return $response;
    }
}

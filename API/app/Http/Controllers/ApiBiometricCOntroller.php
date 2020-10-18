<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBiometricCOntroller extends Controller
{
    public function savedregister(Request $request){
        $audio = $request->audio;
        $imei = $request->imei;
        $userId = $request->userId;

    }

    public function getbio(Request $request){
        $audio = $request->audio;
        $imei = $request->imei;
        $userId = $request->userId;

    }

    public function validatebio(Request $request){
        $audio = $request->audio;
        $imei = $request->imei;
        $userId = $request->userId;

    }

}

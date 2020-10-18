<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBiometricCOntroller extends Controller
{
    public function savedregister(Request $request){
        $audio = $request->audio;
        $imei = $request->imei;
        $userId = $request->userId;
        $procedure = \DB::select('CALL usp_biometric_credentials_save(?,?,?)',[1,"FingerPrint","textVoice"]);
        //p_fingerprint
        //textp_voice
        return json_encode($procedure);
    }

    public function getbio(Request $request){
        $userId = $request->userId;
        $procedure = \DB::select('CALL usp_biometric_credentials_get(?)',[$userId]);
        return json_encode($procedure);
    }

    public function validatebio(Request $request){
        $audioGetIt = $request->audio;
        $audioBD = $request->imei;

    }

    public function servicioprueba(Request $request){
        $procedure['data1'] = "DATA 1";
        $procedure['data2'] = "DATA 2";
        return json_encode($procedure);
    }

}

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

    public function getalldata(Request $request){
        $userId = $request->userId;
        //$procedure = \DB::select('CALL usp_user_get(?)',[1]);
        //$data = collect($procedure)->map(function($x){ return (array) $x; })->toArray();
        $db = \DB::connection();
        $stmt = $db->getPdo()->prepare("CALL usp_user_get(?)");
        $stmt->execute([1]);
        //$result = $stmt->fetchAll(\PDO::FETCH_CLASS);
        $i = 0;
        do { $rowset = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if ($rowset) {
                $result["table{$i}"] = $rowset; $i++;
            }
        }while ($stmt->nextRowset());

        dd($result);
        //return json_encode($procedure);
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



    public function enviarNotificacion() {
        // Cargamos los datos de la notificacion en un Array
        $notification = array();
        $notification['title'] = 'Título de la notificación';
        $notification['message'] = 'Mensaje de la notificación';
        $notification['image'] = '';
        $notification['action'] = '';
        $notification['action_destination'] = '';
        $topic = "topic_general";
        /*$fields = array(
            'to' => '/topics/' . $topic,
            'data' => $notification,
        );*/
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = array(
                    'Authorization: key=AIzaSyCU2Glug7KfEuzGpZ4SdFyHU4k47AILRI4',
                    'Content-Type: application/json'
                    );

        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Disabling SSL Certificate support temporarily
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
    }
}

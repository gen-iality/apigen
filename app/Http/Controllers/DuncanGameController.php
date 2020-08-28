<?php

namespace App\Http\Controllers;

use App\Attendee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Controla la dinámica de puntajes para una experiencia de un cliente (disney)
 * pra un juego de lanzamiento que se realizo en agosto del 2020
 */
class DuncanGameController extends Controller
{

    const DUNCAN_EVENT_ID = "5f3fecdc5480a53a9f721bc2";
    const LIMITESEGUNDOSPARAJUGARNUEVAMENTE = 3600;
    const AVALIABLE_GAMES = ["darts", "spaceinvaders", "annie", "rullettee"];

    /**
     * duncan juego guardamos el puntaje con el timestamp para después poder
     * limitar la cantiadad de veces jugadas por tiempo
     * @return \App\Attendee
     */
    public function guardarpuntaje(Request $request)
    {
        $data = $request->json()->all();
        $rules = [
            'user_id' => 'required',
            'game' => ["required", Rule::in(DuncanGameController::AVALIABLE_GAMES)],
            'puntaje' => ['required', 'numeric'],
        ];
        $messages = ['in' => "Game should be one of: " . implode(", ", DuncanGameController::AVALIABLE_GAMES)];
        $validator = Validator::make($data, $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }

        $attendee = Attendee::where('account_id', $data['user_id'])->where('event_id', DuncanGameController::DUNCAN_EVENT_ID)->first();
        $nombre_campo_juego = $data['game'] . "_timestamp";

        $properties = $attendee->properties;

        //Vamos a limitar la guardada de puntaje para que guarde si la condición de tiempo se cumple, sino error.
        if (isset($attendee->properties[$nombre_campo_juego])) {
            DuncanGameController::LIMITESEGUNDOSPARAJUGARNUEVAMENTE;
            $timestampultimojuego = $attendee->properties[$nombre_campo_juego];
            if ($timestampultimojuego) {
                $timestampahora = time();
                if (DuncanGameController::LIMITESEGUNDOSPARAJUGARNUEVAMENTE - ($timestampahora - $timestampultimojuego) > 0) {
                    return response()->json(['errors' => "No se ha cumplido el tiempo para jugar, el puntaje no se suma, se necesitan " . DuncanGameController::LIMITESEGUNDOSPARAJUGARNUEVAMENTE . " segundos entre juego y juego"], 400);
                }
            }
        }

        //actualizamos el tiempo de la última jugada
        $properties[$nombre_campo_juego] = time();
        //sumamos el puntaje al puntaje que ya tiene el usuario si exsite
        $properties["puntaje"] = (isset($properties["puntaje"]) && $properties["puntaje"]) ? ($properties["puntaje"] + $data["puntaje"]) : $data["puntaje"];

        $attendee->properties = $properties;

        $attendee->save();
        return $attendee;

    }

    /**
     *  numero de segundos desde que jugue,
     *
     * @param Request $request
     * @return int numero de segundos desde que jugue, menos una hora que es limite de tiempo para volver a jugar
     * si el número es positivo no puedo jugar, si es negativo significa que ya paso más de una hora
     */
    public function minutosparajugar(Request $request)
    {
        $data = $request->input();

        $rules = [
            'user_id' => 'required', //Must be a number and length of value is 8
            'game' => ["required", Rule::in(DuncanGameController::AVALIABLE_GAMES)],
        ];
        $messages = ['in' => "Game should be one of: " . implode(", ", DuncanGameController::AVALIABLE_GAMES)];
        $validator = Validator::make($data, $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }

        $attendee = Attendee::where('account_id', $data['user_id'])->where('event_id', DuncanGameController::DUNCAN_EVENT_ID)->first();
        $nombre_campo_juego = $data['game'] . "_timestamp";

        $timestampultimojuego = isset($attendee->properties[$nombre_campo_juego]) ? $attendee->properties[$nombre_campo_juego] : null;
        $timestampahora = time();

        //Condición si núnca  ha jugado retornamos un número negativo para indicar que puede jugar
        if (!$timestampultimojuego) {
            return -1;
        }
        return DuncanGameController::LIMITESEGUNDOSPARAJUGARNUEVAMENTE - ($timestampahora - $timestampultimojuego);

    }

    /**
     *  Mensaje que se enviará mediante SMS al usuario invitado
     *
     * @param Request $request
     * @return string confirmación de que el mensaje fue enviado
     * 
     */
    public function invitaramigos(Request $request){

        $data = $request->json()->all();
        
        foreach ($data as $key => $item){

            $info = [
                "from" => "InfoSMS",
                "to" => "57".$item['phone'],
                "text" => "Bienvenido a Duncanville"
            ];

            $client = new \GuzzleHttp\Client();     
            $headers = [
                'Authorization' => 'Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'        
            ];
            $response = $client->request('POST','http://api.messaging-service.com/sms/1/text/single', 
            [
                'allow_redirects' => false , 
                'auth' => ['mocionsoft' , 'Mocion_77725!'], 
                'json' => $info,
                'headers' => $headers,
            ]); 
            echo $response->getBody()->getContents();

        }
        
        
        return "Mensaje enviado";

    }

}

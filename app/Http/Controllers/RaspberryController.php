<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaspberryController extends Controller
{
    public $successStatus = 200;
    public $failedStatus  = 401;

    public function __construct ()
    {
    }
     /**
    * Get Response Web Service [63011] | [64011]
    */
    public function sendResponseWebService($code, $ip)
    {
        $fields= [
            'ip' => $ip,
            'code' => $code
        ];

        return response()->json ($fields,
                                 $this->successStatus);
    }

      /**
     * Send Response  webservice [53011] | [54011]
     *
     * @param      <type>  $code   The code
     * @param      <type>  $ip     { parameter_description }
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function webService($code, $ip)
    {
        $fields= [
            'ip' => $ip,
            'code' => $code
        ];

        $data = [
            'ip' => $ip,
            'data' => '53011'
        ];

        return response()->json ($data,
                                     $this->successStatus);
    }

     /**
     * Gets the data user by cdn.
     *
     * @param      <type>  $cdn    The cdn
     *
     * @return     <type>  The data user by cdn.
     */
    public function getDataUserByCDN($cdn)
    {
        $card = $cdn;

        $fun = [
            'users' => function($query) {
                    $query->select([
                        'id',
                        'code',
                        'people_id',
                        'state',
                    ]);
                },
              'users.people' => function($query) {
                    $query->select([
                        'id',
                        'name',
                        'lastname'
                    ]);
                },
        ];

        $res = Card::where('cdn', $card)
                        ->whereHas('users.people')
                        ->with($fun)
                        ->select('id', 'cdn', 'state')
                        ->first();

        $fields = [
            'code' => $res->users[0]->code,
            // 'enabled_user' => $res->users[0]->state,
            'name' => $res->users[0]->people->name,
            'lastname' => $res->users[0]->people->lastname,
            'card' => $res->cdn,
            // 'enabled_card' => $res->state
        ];

        return response()->json($fields,
                                $this->successStatus);
    }
      public function getPictureUserByCDN($cdn)
    {
        dd($cdn);
        $card = $cdn;
        $fun = [
        'users' => function($q) {
                $q->select([
                    'id',
                    'code',
                    'people_id'
                ]);
            },
        'users.people' => function($q) {
                $q->select([
                    'id',
                    'name',
                    'lastname',
                    'picture'
                ]);
            },
        ];
        $res = Card::where('cdn', $card)
                        ->whereHas('users.people')
                        ->with($fun)
                        ->first();

        // $th_name = $res->users[0]->people->picture;
        $th_name = 'xbHsuVeiqBst2YY4puL0C4pzApWvB5ORprYAoEoE.jpeg';
        $localFileName = \Storage::path($th_name);

        return Image::make($localFileName)->response();

        // $response = Response::make($th_name, 200);
        // $response->header('Content-Type', 'image/jpeg');
        // return $response;

        // $localFileName = \Storage::path($th_name);
        // $fileData = file_get_contents($localFileName);
        // $ImgfileEncode = base64_encode($fileData);


        // $fields = [
        //     'cdn' => $cdn,
        //     'picture' => $ImgfileEncode
        // ];

        // return response()->json ($fields,
        //  $this->successStatus);
    }
}

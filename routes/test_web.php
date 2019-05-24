<?php
use Illuminate\Support\Facades\DB;

Route::view('wizard', 'wizard-test.index');
Route::get('upload', 'PeopleController@upload');
Route::get('test', 'AmoebaController@listAllowTraffic');
// Route::get('get-fingerprint-user', 'API\PassportController@getFingerprintUser');


/* TEST */
Route::get('ipass', function () {
    $card = "fred";
    $ip =" 192.168.0.1";
    $list_card =array();
    // $index = \array_search($card, $list_card);
    // if(0 == $index)
        // array_push($list_card, ["cdn"=>$card,"ip"=> $ip]);
        array_push($list_card, ["cdn"=>"ali","ip"=> $ip]);
        // array_push($list_card, ["cdn"=>"reza","ip"=> $ip]);

    $top = sizeof($list_card) - 1;
    $bottom = 0;
    $elem = "ali";
    while($bottom <= $top)
    {
        if($list_card[$bottom]["cdn"] == $elem)
            dd("ok");
            unset($list_card[$bottom]);
        
        $bottom++;
    }       
    array_push($list_card, ["cdn"=>"marjan","ip"=> $ip]);

    dd($list_card);

    // $index = in_array_field("fred", $list_card);
//
    // dd([$list_card, $index]);
     // ["id" => $id, "name" => $name]
    foreach ($arrayData as $variable) {
        foreach ($variable as  $value) {
            $index = \array_search($card, $variable);
            dd($index);
        }
        
        // echo "id: $id, name: $name\n";
    }
    // foreach ($arrayData as  $value) {
    //     dd($value);
    // }
    
    // dd($index);

     $card_cdn = '2047437529';
     $ip = '192.168.0.2';
     $fun = [
         
            'cards' => function($q) {
                $q->select([
                    'cards.id',
                    'cards.cdn',
                    'cards.startDate',
                    'cards.endDate',
                ]);
            },

            'cards.users' => function($q) {
                $q->select([
                    'users.id',
                    'users.code',
                    'users.people_id',
                    'users.state',
                ]);
            },

            'cards.users.people' => function($q) {
                $q->select([
                    'people.id',
                    'people.name',
                    'people.lastname',
                    'people.gender_id'
                ]);
            },
        ];
        $result = \App\Gatedevice::where('ip', $ip , function($query) use($card_cdn){
                                    $query->whereHas('cards', function($query) use($card_cdn){
                                        $query->where('cards.cdn', $card_cdn);
                                        $query->whereHas('users',function($query){
                                            $query->whereHas('people');
                                        });
                                    });
                                })
                                ->with($fun)
                                ->select('id', 'name', 'ip')
                                ->first();
        dd($result->cards[0]->cdn);
        // dd($result->cards[0]->users[0]->people->name);
    /*$card = '2047437500';
    \DB::statement('CALL spCheckCard(:cdn, @res);', array($card));
    $result_card = \DB::select('select @res as res');
    if (!isset($result_card)) {
        dd("no");
    }
    else
        dd($result_card[0]->res);

    
    // $list[] = $card;
    array_push($list, "12345", "2222");
    $index = \array_search($card, $list);
  
    // unset($list[$index]);
    dd($list);

    // dd($result_card[0]->res);
  
   
    $raw = \DB::raw("CALL spCheckCard($card, @someOutParameter)");


    $opResult = \DB::select ('select @someOutParameter as res');

    dd($opResult);
    
    $card_cdn = '2047437529';
    $ip = '192.168.1.10';
    $direct = "1";*/

    


    // $gate_option = \App\Gateoption::where('startDate','<=', $current_date )
    //                                 ->where('endDate', '>=', $current_date)
    //                                 ->count();

    // if(0 == $gate_option)
    //     return false;
    // else
    // {
      /*  $gate_option_data = \App\Gateoption::select(['genzonew_id', 'genzonem_id'])
                                            ->get();
       

        $res_card = 0;
        dd($result[0]->gatedevices);

        // اصلا مشخصاتی وجود ندارد
        if (!isset($result) || empty($result)) {
            return $res_card;
        }
        else if (isset($result))
        {
            // گیتی به این آی پی تخصیص ندارد
            if (! isset($result[0]->gatedevices))
                return $res_card;
            else
            {

                // شماره کارت برمی گردد
                foreach ($result[0]->gatedevices as $gatedevice) {
                    foreach ($gatedevice->cards as $card) {
                       if ($card_cdn == $card->cdn)
                       {
                            if(!($card->startDate <= $current_date and $card->endDate >= $current_date))
                            {
                                // end expired_card
                                $res_card = "card expired";
                            }
                            else
                            {   
                                // if($card->user[0])
                                if(0 ==  $card->users[0]->state)
                                {
                                    $res_card = "user deactive ";
                                }
                                else {
                                    $res_gender_people = $card->users[0]->people->gender_id;
                                    $res_gender = 0;

                                    switch ($res_gender) {
                                        case '1':
                                            $res_gender = $gate_option_data->genzonem_id;
                                            break;
                                         case '2':
                                            $res_gender = $gate_option_data->genzonew_id;
                                            break;
                                    }
                                    switch ($res_gender) {
                                        // // Dont Sensitive
                                        // case '1':
                                        //     // save traffic
                                        //     break;
                                        
                                        // default:
                                        //     # code...
                                        //     break;
                                    }
                                    $gate_option_data->genzonem_id;

                                }
                            }
                       }
                    }
                }
            }
        }
        return $res_card;
      
    }*/
  

   

    // return $items;
});

Route::get('suprima', function(){

    $code = '0000000000';
    $fun = [
        'people' => function($query){
             $query->select([
                'id',
                'name',
                'lastname',
                'nationalId'
                ]);
            },
        ];
    $items = \App\User::wherehas('people',function($query) use($code){
                    $query->Where('users.code', $code);
                    $query->orWhere('people.nationalId', $code);
                })
                ->leftJoin('fingerprints', 'fingerprints.user_id', 'users.id')

                ->with($fun)
                ->select(['users.id',
                            'users.code',
                            'people_id',
                            'fingerprints.id as finger_id',
                            'fingerprints.fingerprint_user_id',
                            'fingerprints.image_url',
                        ])
                ->get();


        return $items;
});

Route::get('getData', function(){

});

Route::get('pic', function(){

    $cdn = '2047437529';
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
    $res = App\Card::where('cdn', $cdn)
                    ->whereHas('users.people')
                    ->with($fun)
                    ->first();


// ;    // $localFileName  = public_path().'/uploads/php.png';

//
    $th_name = $res;
    // $localFileName = \Storage::path($th_name);
    // $fileData = file_get_contents($localFileName);
    // $ImgfileEncode = base64_encode($fileData);

    // $fields = [
    //     'cdn' => $cdn,
    //     'picture' => $ImgfileEncode
    // ];

    // return response()->json ($fields,
    //                                 200);

    return $th_name;


});

Route::get('send-sms', function () {
    $lang_code = App::getLocale();
     // dd($lang_code);
     // Config::get('app.locale')
    dd(Config::get('app.locale'));
    // \App\Jobs\ProcessSendSMS::dispatch ('+989128812298', 'my message comes here', 1);
});


/*  END: TEST  */

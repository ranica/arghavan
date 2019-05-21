<?php
use Illuminate\Support\Facades\DB;

Route::view('wizard', 'wizard-test.index');
Route::get('upload', 'PeopleController@upload');
Route::get('test', 'AmoebaController@listAllowTraffic');
// Route::get('get-fingerprint-user', 'API\PassportController@getFingerprintUser');


/* TEST */
Route::get('ipass', function () {
    $ip = '192.168.1.10';

    $items =\App\User::leftJoin('cards', function($join)
                        {
                            $join->on ('cards.user_id', 'users.id');
                            $join->whereNull('cards.deleted_at');
                        })
                    // ->leftJoin('cardtypes', 'cardtypes.id', '=', 'cards.cardtype_id')
                    // ->leftJoin('people', function($join) use ($request)
                    //     {
                    //         $join->on ('people.id', '=', 'users.people_id');

                    //         if (! is_null ($request->nationalId)){
                    //             $join->orWhere('people.nationalId', '=', $request->nationalId);
                    //         }

                    //         if (! is_null ($request->name)){
                    //             $join->orWhere('people.name', 'like', '%' . $request->name . '%');
                    //         }

                    //         if (! is_null ($request->lastname)){
                    //             $join->orWhere('people.lastname', 'like', '%' .  $request->lastname . '%');
                    //         }
                    //     })
                    // ->OrWhere('users.code', '=', $request->code)
                    ->select([

                        'users.id as user_id',
                        'users.code as user_code',
                        // 'people.name as user_people_name',
                        // 'people.lastname as user_people_lastname',
                        'cards.cdn as card_cdn',
                    ])
                    ->get();



    return $items;
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

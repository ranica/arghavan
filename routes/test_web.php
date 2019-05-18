<?php
use Illuminate\Support\Facades\DB;

Route::view('wizard', 'wizard-test.index');
Route::get('upload', 'PeopleController@upload');
/* TEST */


Route::get('ipass', function () {
   $buildings = \App\Building::select (['id',
                                         'name'])
                                ->get ();

            $terms = \App\Term::with('semester')
                                ->select (['id',
                                            'semester_id',
                                            'year',
                                            'startDate',
                                            'endDate'])
                                  ->get ();
            $degrees = \App\Degree::select (['id',
                                            'name'])
                                     ->get ();
            $gatePlans = \App\GatePlan::select (['id',
                                                'name'])
                                     ->get ();


            $result = [
                        'degrees'        => $degrees,
                        'buildings'      => $buildings,
                        'gatePlans'      => $gatePlans,
                        'terms'           => $terms,
                   ];

            return $result;
});

Route::get('allow', function(){

    $ip = '192.168.1.10';
    $fun = [
        'gatedevices' => function($q) {
                $q->select([
                    'id',
                    'name',
                    'ip'
                ]);
            },

            'gatedevices.cards' => function($q) {
                $q->select([
                    'cards.id',
                    'cards.cdn',
                ]);
            },
    ];

    $result = App\Amoeba::where('ip', $ip)
                            ->whereHas('gatedevices', function($query){
                                $query->whereHas('cards');
                            })
                            ->with($fun)
                            ->select('id', 'name')
                            ->get();

       //  $fields= [
       //      'ip' => $result-,
       //      'code' => $code
       //  ];

       // return response()->json ($fields,

    return $result;
});

Route::get('getData', function(){
    $card = '2047437529';

    $fun = [
        'users' => function($q) {
                $q->select([
                    'id',
                    'code',
                    'people_id',
                    'state',
                ]);
            },
          'users.people' => function($q) {
                $q->select([
                    'id',
                    'name',
                    'lastname'
                ]);
            },
    ];
    $res = App\Card::where('cdn', $card)
                    ->whereHas('users.people')
                    ->with($fun)
                    ->select('id', 'cdn', 'state')
                    ->first();

    $fields = [
        'code' => $res->users[0]->code,
        'enabled_user' => $res->users[0]->state,
        'name' => $res->users[0]->people->name,
        'lastname' => $res->users[0]->people->lastname,
        'cart' => $res->cdn,
        'enabled_cart' => $res->state,
    ];

    return response()->json [ $fields, 200];
    return  $fields;
;});

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
    $th_name = $res->users[0]->people->picture;
    $localFileName = \Storage::path($th_name);
    $fileData = file_get_contents($localFileName);
    $ImgfileEncode = base64_encode($fileData);

    $fields = [
        'cdn' => $cdn,
        'picture' => $ImgfileEncode
    ];

    return response()->json ($fields,
                                    200);

    return $ImgfileEncode;


});

Route::get('send-sms', function () {
    $lang_code = App::getLocale();
     // dd($lang_code);
     // Config::get('app.locale')
    dd(Config::get('app.locale'));
    // \App\Jobs\ProcessSendSMS::dispatch ('+989128812298', 'my message comes here', 1);
});


/*  END: TEST  */

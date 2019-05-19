<?php
use Illuminate\Support\Facades\DB;

Route::view('wizard', 'wizard-test.index');
Route::get('upload', 'PeopleController@upload');
Route::get('test', 'AmoebaController@listAllowTraffic');
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




       //  $fields= [
       //      'ip' => $result-,
       //      'code' => $code
       //  ];

       // return response()->json ($fields,

    return $res;
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

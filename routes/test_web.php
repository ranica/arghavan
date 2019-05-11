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



Route::get('send-sms', function () {
    $lang_code = App::getLocale();
     // dd($lang_code);
     // Config::get('app.locale')
    dd(Config::get('app.locale'));
    // \App\Jobs\ProcessSendSMS::dispatch ('+989128812298', 'my message comes here', 1);
});

// Route::get('report-count', 'ReportController@chartCountDailyTraffic');
// Route::view('chart', 'chartTest');
// Route::view('test-ojvar', 'dashboard.index');
// //Route::view('test-card', 'test-card');
// Route::get('/report/test', 'ReportController@indexTest')
//      ->name('report_test');
/*  END: TEST  */

<?php
use Illuminate\Support\Facades\DB;


Route::view('rp', 'reports.manual.index');
Route::get('export', 'UserController@export');
Route::get('pdf', 'TestController@tcp_pdf');
// Route::get('pdf', 'TestController@testMPDF');
Route::view('me', 'gatedevices.test');
Route::view('router', 'layouts.vue-app');
Route::view('vue', 'vue-router.app');

// Route::view('chart', 'report-test');
Route::view('error', 'layouts.err-master');
// Route::view('report', 'reports.report');
Route::view('tab', 'car_base.index');

Route::get('report', function(){

      $dateRange = [\Carbon\Carbon::today(),
                    \Carbon\Carbon::today()->endOfDay()];

        $fieldsInput = ([
                        'gatetraffics.user_id as user',
                        'gatetraffics.gatedate',
                        'genders.gender',
                        'groups.name as group_name',
                        'users.code',
                        'people.name',
                        'people.lastname',
                        'people.nationalId',
                        'gatemessages.message',
                        'gatepasses.name as gatepass',
                        'gatedirects.name as gatedirect'
            ]);

        $groupByFields =(\DB::raw('gatetraffics.gatedirect_id'));

        $reportInput = \App\Gatetraffic::whereBetween('gatetraffics.gatedate', $dateRange)
                            ->join ('users', 'gatetraffics.user_id', 'users.id')
                            ->join ('groups', 'groups.id', 'users.group_id')
                            ->join ('people', 'people.id', 'users.people_id')
                            ->join ('genders', 'genders.id', 'people.gender_id')
                            ->join('gatedevices', 'gatedevices.id', 'gatedevices.gatepass_id')
                            ->join('gatepasses', 'gatepasses.id', 'gatetraffics.gatepass_id')
                            ->join('gatedirects', 'gatedirects.id', 'gatetraffics.gatedirect_id')
                            ->join('gatemessages', 'gatemessages.id', 'gatetraffics.gatemessage_id')
                            ->doneTraffic()
                            ->inputTraffic()
                            ->passDontCarTraffic()
                            ->whereNotIn('user_id', function ($query) use($dateRange) {
                                                $query->select(\DB::raw('gatetraffics.user_id'))
                                                    ->from('gatetraffics')
                                                    ->whereBetween('gatetraffics.gatedate', $dateRange)
                                                    ->where('gatetraffics.gatedirect_id', '=', \App\Report::$GATE_OUTPUT);
                                            })
                            ->select($fieldsInput)
                            ->groupBy($groupByFields)
                            ->toSql();
                            dd($reportInput);

        return $reportInput;
});

// Route::get('data', function() {
//     $cardtype_id = 4;
//     $search = null;

//     $fnc = [
//                 'card' => function($q){
//                     $q->select([
//                                     'id',
//                                     'cdn',
//                                     'cardtype_id',
//                                     'startDate',
//                                     'endDate',
//                                     'state'
//                                 ]);
//                 },
//                 'card.cardtype' => function($q){
//                     $q->select([
//                                     'id',
//                                     'name'
//                                 ]);
//                 },
//                 'users' => function($q){
//                     $q->select([
//                                     'id',
//                                     'people_id',
//                                     'code',
//                                     'group_id'
//                                 ]);
//                 },
//                 'users.group' => function($q){
//                     $q->select([
//                                     'id',
//                                     'name'
//                                 ]);
//                 },
//                 'users.people' => function ($q){
//                     $q->select([
//                                     'id',
//                                     'name',
//                                     'lastname',
//                                     'nationalId'
//                                 ]);
//                 },
//                'carColor' => function ($q){ $q->select(['id','name' ]);},
//                 'carModel' => function ($q){$q->select([ 'id','name']);},
//                 'carType' => function ($q){ $q->select(['id','name' ]);},
//                'carLevel' => function ($q){ $q->select(['id','name' ]);},
//                 'carSystem' => function ($q){ $q->select(['id','name' ]);},
//                'carFuel' => function ($q){ $q->select([ 'id','name']);},
//                'carPlateType' => function ($q){ $q->select(['id', 'name']);},
//             ];
//         $res = \App\Car::whereHas('users.people', function($q) use($search){
//                             if(! is_null($search)){
//                                 $q->where ('users.code', 'like' , "%$search%");
//                                 $q->orwhere ('people.name', 'like' , "%$search%");
//                                 $q->orwhere ('people.lastname', 'like' , "%$search%");
//                                 $q->orwhere ('people.nationalId', 'like' , "%$search%");
//                             }
//                         })
//                         ->whereHas('card', function($q) use($cardtype_id) {
//                             $q->where('cardtype_id', $cardtype_id);
//                         })
//                         ->with($fnc)
//                         ->select(['id', 'plate_first', 'plate_second', 'plate_word',
//                                   'card_id',
//                                   'car_color_id',
//                                   'car_fuel_id',
//                                   'car_level_id',
//                                   'car_system_id',
//                                   'car_model_id',
//                                   'car_type_id',
//                                   'car_plate_type_id',
//                                   'car_plate_city_id',
//                                   'model',
//                                   'capacity',
//                                   'chasiscode',
//                                   'enginecode'
//                          ])
//                         ->get();
//     return $res;

// });

Route::get('marjan', 'CardController@indexSearch');
// Route::get('marjan', 'TermController@allTerm');
Route::get('upload', 'TestController@uploadImage');
Route::get('upload', 'PeopleController@upload');

/* TEST */

Route::view('table', 'people.table');




Route::get('ipass', function () {
    $uni = \App\Field::where('university_id', '=', 1)->get();

    return $uni;
});


// $c  = Smsir::send(['test1'],['09128812298']);
// dd($c);

Route::get('ojvar1', function () {
    $traffic = [
        (Object)['id' => 1, 'name' => 'n'],
        (Object)['id' => 2, 'name' => 'm'],
        (Object)['id' => 3, 'name' => 'k'],
    ];
    $v = view('prints.allTraffic', compact('traffic'));

    return $v;
});
Route::get('send-sms', function () {
    $lang_code = App::getLocale();
     // dd($lang_code);
     // Config::get('app.locale')
    dd(Config::get('app.locale'));
    // \App\Jobs\ProcessSendSMS::dispatch ('+989128812298', 'my message comes here', 1);
});

// Route::get('report-count', 'ReportController@chartCountDailyTraffic');
Route::view('chart', 'chartTest');
// Route::view('test-ojvar', 'dashboard.index');
// //Route::view('test-card', 'test-card');
// Route::get('/report/test', 'ReportController@indexTest')
//      ->name('report_test');
/*  END: TEST  */

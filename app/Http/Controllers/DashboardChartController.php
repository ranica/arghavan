<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardChartController extends Controller
{
    /**
     * Show Dashboard Chart Count Today based on hours
     */
    public function chartCountDailyTraffic(){
        $dateRange = [\Carbon\Carbon::today(),
                      \Carbon\Carbon::today()->endOfDay()];

        $fieldsInput = ([\DB::raw('count(*) as count'),
                        \DB::raw('gatedirect_id as input')]);

        $fieldsOutput = ([\DB::raw('count(*) as count'),
                        \DB::raw('gatedirect_id as output')]);

        $groupByFields =(\DB::raw('gatedirect_id'));

        $reportCountInput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->inputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsInput)
                            ->groupBy($groupByFields)
                            ->get();

        $reportCountOutput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->outputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsOutput)
                            ->groupBy($groupByFields)
                            ->get();

        if (isset($reportCountInput[0]) )
        {
            $countInput = $reportCountInput[0]->count;

            if (isset($reportCountOutput[0]))
            {
                $count = $countInput - $reportCountOutput[0]->count;
                return $count;
            }

            return $countInput;
        }
        return 0;
    }

    public function reportDailyTraffic()
    {
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
                            ->get();

        return $reportInput;
    }

    /**
     * Show Dashboard Chart Today based on hours
     */
    public function chartDailyTraffic()
    {
        $dateRange = [\Carbon\Carbon::today(), \Carbon\Carbon::today()->endOfDay()];

        $fieldsInput = [\DB::raw('HOUR(gatedate) as hour'),
                        \DB::raw('gatedirect_id as input'),
                        \DB::raw('count(*) as count')];

        $fieldsOutput = [\DB::raw('HOUR(gatedate) as hour'),
                         \DB::raw('gatedirect_id as output'),
                         \DB::raw('count(*) as count')];

        $groupByFields =[\DB::raw('HOUR(gatedate)'),
                        \DB::raw('gatedirect_id')];

        $reportInput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->inputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsInput)
                            ->groupBy($groupByFields)
                            ->get();

        $reportOutput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->outputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsOutput)
                            ->groupBy($groupByFields)
                            ->get();

        $result = meargeDailyTraffics($reportInput, $reportOutput);

        return $result;
   }

    /**
     * Show Dashboard Chart Weekday
     */
    public function chartWeekdayTraffic()
    {
        $dateRange = [\Carbon\Carbon::today()->startOfWeek(), \Carbon\Carbon::today()->endOfWeek()];

        $fieldsInput = [\DB::raw('DAYNAME(gatedate) as day'),
                        \DB::raw('DAYOFWEEK(gatedate) as dayNumber'),
                        \DB::raw('gatedirect_id as input'),
                        \DB::raw('count(*) as count')];

        $fieldsOutput = [\DB::raw('DAYNAME(gatedate) as day'),
                        \DB::raw('DAYOFWEEK(gatedate) as dayNumber'),
                         \DB::raw('gatedirect_id as output'),
                         \DB::raw('count(*) as count')];

        $groupByFields =[\DB::raw('DAYNAME(gatedate)'),
                        \DB::raw('DAYOFWEEK(gatedate)'),
                        \DB::raw('gatedirect_id')];

        $reportInput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->inputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsInput)
                            ->groupBy($groupByFields)
                            ->get();

        $reportOutput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->outputTraffic()
                            ->select($fieldsOutput)
                            ->groupBy($groupByFields)
                            ->get();

        $result = meargeWeekdayTraffics($reportInput, $reportOutput);
        return $result;
   }

   /**
     * Show Dashboard Chart Month
     */
    public function chartMonthTraffic()
    {
        $dateRange = [\Carbon\Carbon::today()->firstOfYear(),
                     \Carbon\Carbon::today()->endOfYear()];

        $fieldsInput = [\DB::raw('MONTHNAME(gatedate) as month'),
                        \DB::raw('gatedirect_id as input'),
                        \DB::raw('count(*) as count')];

        $fieldsOutput = [\DB::raw('MONTHNAME(gatedate) as month'),
                         \DB::raw('gatedirect_id as output'),
                         \DB::raw('count(*) as count')];

        $groupByFields =[\DB::raw('MONTHNAME(gatedate)'),
                        \DB::raw('gatedirect_id')];

        $reportInput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->inputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsInput)
                            ->groupBy($groupByFields)
                            ->get();

        $reportOutput = \App\Gatetraffic::whereBetween('gatedate', $dateRange)
                            ->doneTraffic()
                            ->outputTraffic()
                            ->passDontCarTraffic()
                            ->select($fieldsOutput)
                            ->groupBy($groupByFields)
                            ->get();

        $result = meargeMonthTraffics($reportInput, $reportOutput);
        return $result;
   }
}

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
   /**
    * Loads a present report.
    */
   public function loadPresentReport()
   {
        // $page = $request->page;
        $page = 1;
        $res = \DB::raw("CALL spPresentReport();");
        $mydata = \DB::select($res);

        $perPage = Controller::C_PAGINATE_SIZE;
        $offset = ($page * $perPage) - $perPage;
        $result = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($mydata, $offset, $perPage, true), // Only grab the items we need
            count($mydata), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()] // We need this so we can keep all old query parameters from the url
        );

        return $result;
   }
   /**
    * Load Gate Device active report
    */
    public function loadGateDeviceActiveReport()
    {
        $page = 1;
        $res = \DB::raw("CALL spGateActiveReport();");
        $mydata = \DB::select($res);

        $perPage = Controller::C_PAGINATE_SIZE;
        $offset = ($page * $perPage) - $perPage;
        $result = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($mydata, $offset, $perPage, true), // Only grab the items we need
            count($mydata), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()] // We need this so we can keep all old query parameters from the url
        );

        return $result;
    }

    /**
     * Loads a posted sms report.
     */
    public function loadPostedSMSReport()
    {
        try {
            $mydata = \App\Sms::status()
                            ->paginate(Controller::C_PAGINATE_SIZE);
        }
        catch (\Exception $e) {
            $mydata = [];
        }
        return $mydata;
    }
}

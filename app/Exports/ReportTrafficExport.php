<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Http\Request;
use App\User;


class ReportTrafficExport implements FromQuery
{
    use Exportable;
    public $startDate;
    public $endDate;
    public function __construct($startDate,
                                 $endDate)
    {
        // dd($request);
      /* $this->code = $request->code;
        $this->group_id = $request->groupId;
        $this->type_filter = $request->type_filter;
        $this->commonrange_id = $request->commonrangeId;
        $this->gender_id = $request->genderId;
        $this->gatedevice_id = $request->deviceId;
        $this->gatemessage_id = $request->messageId;
        $this->gatedirect_id = $request->directId;
        $this->startDate = $request->beginDateTime;
        $this->endDate = $request->endDateTime;*/

        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function query()
    {
        $sDate = \Carbon\Carbon::parse ($this->startDate);
        $eDate = \Carbon\Carbon::parse ($this->endDate);

        $dateRange = [
                          $sDate,
                          $eDate
                     ];


        // dd($this->startDate);
        // return User::query()->where('code', 1000);
        // Invoice::query()->whereYear('created_at', $this->year);
       $res=  \App\Gatetraffic::query()
                                ->whereBetween('gatedate', $dateRange);
       /* $res = $res->join ('users', 'gatetraffics.user_id', 'users.id')
                   ->join ('people', 'people.id', 'users.people_id')
                   ->join ('genders', 'genders.id', 'people.gender_id')
                   ->join ('groups', 'groups.id', 'users.group_id')
                   ->join('gatedevices', 'gatedevices.id', 'gatetraffics.gatedevice_id')
                   ->join('gatepasses', 'gatepasses.id', 'gatetraffics.gatepass_id')
                   ->join('gatedirects', 'gatedirects.id', 'gatetraffics.gatedirect_id')
                   ->join('gatemessages', 'gatemessages.id', 'gatetraffics.gatemessage_id');

        if (! is_null($this->group_id) && ($this->group_id > 0)){
            $res = $res->where('users.group_id', $this->group_id);
        }

        if (! is_null($this->code)){
            $res = $res->where('users.code','like', "%$this->code%");
        }

        if (!is_null ($this->gatemessage_id)) {
            $res = $res->Where ('gatemessages.id', '=', $this->gatemesage_id);
        }

        if (!is_null ($this->gatedevice_id)) {
            $res = $res->Where ('gatedevices.id', '=', $this->gatedevice_id);
        }

        if (!is_null ($this->gatedirect_id)) {
            $res = $res->Where ('gatedirects.id', '=', $this->gatedirect_id);
        }

        if (!is_null ($this->gender_id)) {
            $res = $res->Where ('genders.id', '=', $this->gender_id);
        }


        $res = $res->select ('gatetraffics.gatedate as gatetraffic_gatedate',
                            'gatemessages.message as gatemessage_name',
                            'gatedirects.name as gatedirect_name',
                            'genders.gender as gender_name',
                            'groups.name as group_name',
                            'users.code as user_code',
                            'people.name as people_name',
                            'people.lastname as people_lastname',
                            'people.nationalId as people_nationalId'
                        )
                    ->get();
                    return $res;


        return $res->get();*/
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $user = user::select('id', 'code')
        //             ->get();
        // return $user;
    }
}

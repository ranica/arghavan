<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
     use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
    /**
     * Creates if not exists.
     *
     * @param      <type>  $request  The request
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public static function createIfNotExists($request)
    {
        $room = Room::withTrashed()
                            ->where([
                                'number', $request->number,
                                'building_id', $request->building_id,
                                'gender_id', $request->gender,
                            ])
                            ->first();

        if (is_null($room))
        {
            $newRoom = Room::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'state' => $request->state,
                ]);

            return $newRoom;
        }
        else
        {
            $room->restore();

            return $room;
        }

        return null;
    }

}

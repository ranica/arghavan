<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $method = $request->method();

        if ($method == "post")
        {
            return [
                'cdn' => 'required|min:2|max:50|unique:cards,deleted_at,null'
            ];
        }

        if (($method == "put") || ($method == "push"))
        {
            $id = $this->card->id;

            return [
                'cdn' => 'required|min:2|max:50|unique:cards,deleted_at,null,cdn,' . $id,
                'group_id' => 'required|numeric|exists:groups,id',
                'cardtype_id'  => 'required|numeric|exists:cardtypes,id',
            ];
        }

        return [];
    }
}

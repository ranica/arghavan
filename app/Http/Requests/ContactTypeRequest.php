<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ContactTypeRequest extends FormRequest
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
                'type' => 'required|min:2|max:50|unique:contactTypes,deleted_at,null'
            ];
        }

        if (($method == "put") || ($method == "push"))
        {
            $id = $this->contactType->id;

            return [
                'type' => 'required|min:2|max:50|unique:contactTypes,deleted_at,null,type,' . $id
            ];
        }

        return [];
    }
}

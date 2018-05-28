<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class TaskRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'audiofile' => 'required|mimetypes:audio/aac,audio/mpga,audio/midi,audio/ogg,audio/wav,audio/webm,audio/3gpp,audio/3gpp2,audio/mp3,audio/mpeg,audio/mpeg4-generic,audio/mp4,mp3'
        ];
    }
}

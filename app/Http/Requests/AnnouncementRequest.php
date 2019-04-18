<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Announcement;

class AnnouncementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:' . implode(',', array_keys(Announcement::postStatus())),
            'publish_at' => 'required|date'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = Post::where('slug', $this->route('slug'))->first();

        return $post && $this->user()->can('update', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'        => 'required|string',
            'content'      => 'required|string',
            'draft'        => 'boolean',
            'publish_time' => 'date_format:"Y-m-d H:i:s"',
        ];
    }
}

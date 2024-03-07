<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string',
                Rule
                    ::unique('posts', 'title')
                    ->ignore($this->route('post')->id)
            ],
            'description' => ['required', 'string'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        // slug: this is sample title -> this-is-sample-title
        return array_merge(
            parent::validated(),
            [
                'slug' => Str::slug(request('title')),
                'user_id' => Auth::id()
            ]
        );
    }
}

<?php

namespace App\Http\Requests\Link;

use App\Traits\Requests\Requestable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreLinkRequest extends FormRequest
{
    use Requestable;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('links_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'original_url' => ['required', 'url'],
        ];
    }
}

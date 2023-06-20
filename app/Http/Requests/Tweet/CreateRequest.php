<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'problem' => 'required|max:140',
            'solution' => 'required|max:140'
        ];
    }

    public function title(): string
    {
        return $this->input('title');
    }

    public function problem(): string
    {
        return $this->input('problem');
    }

    public function solution(): string
    {
        return $this->input('solution');
    }
}

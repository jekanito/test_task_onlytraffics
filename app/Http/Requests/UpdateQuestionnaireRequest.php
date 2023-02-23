<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\UploadFile;

class UpdateQuestionnaireRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'job_title' => 'required|max:255',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id'
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->file('image')) {
            $this->merge([
                'photo' => UploadFile::loadImage($this)
            ]);
        }
    }
}

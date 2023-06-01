<?php

namespace App\Http\Requests\Idea;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('manage', $this->idea());
    }

    public function idea()
    {
        return $this->route('idea');
    }

    public function rules(): array
    {
        return [
            'title' => 'string|min:5',
            'description' => 'string',
        ];
    }

    public function persist()
    {
        return tap($this->idea())->update($this->validated());
    }
}

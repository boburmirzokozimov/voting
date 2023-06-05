<?php

namespace App\Http\Requests\Idea\Status;

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
            'status_id' => 'exists:statuses,id',
        ];
    }
}

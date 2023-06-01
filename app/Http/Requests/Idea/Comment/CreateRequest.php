<?php

namespace App\Http\Requests\Idea\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'user_id' => 'exists:users,id',
            'text' => 'string|min:5',
        ];
    }

    public function persist()
    {
        return tap($this->idea())->addComment($this->validated());
    }

    private function idea()
    {
        return $this->route('idea');
    }
}

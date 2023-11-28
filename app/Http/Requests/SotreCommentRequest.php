<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SotreCommentRequest extends FormRequest
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
            'comment'=>'required|string|max:256',
            'user_id'=>'required|exists:users,id',
            'posts_id'=>'required|exists:posts,id',
        ];
    }
}

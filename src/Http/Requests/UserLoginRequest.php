<?php

namespace Coolcode\AuthApi\Http\Requests;

use Coolcode\AuthApi\Traits\CustomValidationResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    use CustomValidationResponseTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
}

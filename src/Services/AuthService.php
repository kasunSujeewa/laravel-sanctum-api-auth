<?php

namespace Coolcode\AuthApi\Services;

use Illuminate\Support\Facades\Hash;
use Coolcode\AuthApi\Exceptions\CustomAuthException as ExceptionsCustomAuthException;
use Coolcode\AuthApi\Models\User;

class AuthService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function register(array $data)
    {
        $auth_user = $this->user::create($data);

        return $auth_user->createToken('API Token')->plainTextToken;
    }

    public function login(array $data)
    {
       
        $auth_user = $this->user::where('email',$data['email'])->first();

        if (!$auth_user || !Hash::check($data['password'], $auth_user->password)) 
        {
            throw new ExceptionsCustomAuthException();
        }

        return $auth_user->createToken('API Token')->plainTextToken;
    }
}

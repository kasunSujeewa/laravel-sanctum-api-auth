<?php

namespace Coolcode\AuthApi\Exceptions;

use Coolcode\AuthApi\Constants\Constant;
use Exception;
use Illuminate\Http\JsonResponse;

class CustomAuthException extends Exception
{
    protected $statusCode;
    public function __construct($message = Constant::INVALID_LOGINS, $statusCode = JsonResponse::HTTP_UNAUTHORIZED)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }
    
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->getMessage(),
            ], $this->statusCode);
        }

        return redirect()->guest(route('login'))->with('error', $this->getMessage());
    }
}

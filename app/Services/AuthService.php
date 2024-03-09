<?php

namespace App\Services;

use App\Constants\Constants;
use App\Constants\HttpResponse;
use App\Models\User;

class AuthService
{

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function Register($data): array
    {
        $input = $data;
        $input['password'] = $this->bcrypt_fun($input['password']);
        //storing user
        $user = $this->user->storeUser($input);

        $success['token'] =  $this->make_token($user);
        $success['name'] =  $user->name;
        $response['error'] =  false;
        $response['data'] =  $success;
        $response['status_code'] =  201;

        return $response;
    }

    public function bcrypt_fun($data): string
    {
        //bcrypting password
        return bcrypt($data);
    }

    public function make_token($user): string
    {
        //making token for registerd user
        return $user->createToken(Constants::APP_NAME)->accessToken;
    }

    public function login($data): array
    {
        if ($this->user->authUserCheck($data) != null) {
            $user = $this->user->authUserCheck($data);
            $success['user'] = $user;
            $success['token'] = $this->make_token($user);
            $response['error'] = false;
            $response['data'] = $success;
            $response['message'] = HttpResponse::LOGGED_MESSAGE;
            return $response;
        } else {
            $response['error'] = true;
            $response['message'] = HttpResponse::UNAUTH_MESSAGE;
        }
    }
}

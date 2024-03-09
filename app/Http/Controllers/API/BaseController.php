<?php

namespace App\Http\Controllers\API;

use App\Constants\HttpResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result)
    {
    	if(isset($result['error'])){
            return $this->sendErrorResponse($result['message'],$result['data'],isset($result['status_code']) ? $result['status_code'] : HttpResponse::UNAUTH_CODE);
        }
        else{
            return $this->sendSuccessResponse($result['data'],$result['message'],isset($result['status_code']) ? $result['status_code'] : HttpResponse::SUCCESS_CODE);
        }

    }

    public function sendSuccessResponse($result, $message,$code = HttpResponse::SUCCESS_CODE)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, $code);
    }

    public function sendErrorResponse($error, $errorMessages = [], $code = HttpResponse::UNAUTH_CODE)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}

<?php 

namespace App\Constants;

class HttpResponse {

    public const REG_MESSAGE = 'User Registered Successfully';
    public const LOGGED_MESSAGE = 'User Logged Successfully';
    public const UNAUTH_MESSAGE = 'Unauthenticated User';
    public const DATA_RECEIVED_MESSAGE = 'Data Received Successfully';
    public const DATA_CREATED_MESSAGE = 'Data Created Successfully';
    public const DATA_REMOVED_MESSAGE = 'Data Removed Successfully';
    public const DATA_NOTFOUND_MESSAGE = 'Data Not Found Successfully';
    public const ACCESS_DENIED_MESSAGE = 'Access Denied';

    public const CREATED_CODE = 201;
    public const SUCCESS_CODE = 200;
    public const NOTFOUND_CODE = 404;
    public const UNAUTH_CODE = 401;
    public const ACCESS_DENIED_CODE = 403;
    public const NO_CONTENT_CODE = 204;

}
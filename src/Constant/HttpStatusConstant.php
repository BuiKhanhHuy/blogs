<?php
declare(strict_types=1);

namespace App\Constant;

class HttpStatusConstant
{
    public const SUCCESS = 200;

    public const CREATED = 201;


    public const NO_CONTENT = 204;

    public const BAD_REQUEST = 400;


    public const UNAUTHORIZED = 401;


    public const FORBIDDEN = 403;


    public const NOT_FOUND = 404;


    public const METHOD_NOT_ALLOWED = 405;


    public const NOT_ACCEPTABLE = 406;


    public const EXCEEDED_QPS_LIMITATION = 429;


    public const INTERNAL_SERVER_ERROR = 500;


    public const HTTP_NOT_IMPLEMENTED = 501;


    public const SERVICE_UNAVAILABLE = 503;


    public const EXCEPTION_ERROR_MESSAGE_400 = 'Invalid access';

    public const EXCEPTION_ERROR_MESSAGE_401 = 'Authentication failed.';

    public const EXCEPTION_ERROR_MESSAGE_403 = 'Unauthorized';

    public const EXCEPTION_ERROR_MESSAGE_404 = 'Page does not exist.';

    public const EXCEPTION_ERROR_MESSAGE_405 = 'Permission error.';

    public const EXCEPTION_ERROR_MESSAGE_406 = 'There is a defect in the header content.';

    public const EXCEPTION_ERROR_MESSAGE_429 = 'Exceeded QPS limitation.';

    public const EXCEPTION_ERROR_MESSAGE_500 = 'A server error has occurred.';

    public const EXCEPTION_ERROR_MESSAGE_501 = 'Not Implemented.';

    public const EXCEPTION_ERROR_MESSAGE_503 = 'Access is concentrated.';

    public const EXCEPTION_ERROR_MESSAGE_LIST = [
        self::BAD_REQUEST => self::EXCEPTION_ERROR_MESSAGE_400,
        self::UNAUTHORIZED => self::EXCEPTION_ERROR_MESSAGE_401,
        self::FORBIDDEN => self::EXCEPTION_ERROR_MESSAGE_403,
        self::NOT_FOUND => self::EXCEPTION_ERROR_MESSAGE_404,
        self::METHOD_NOT_ALLOWED => self::EXCEPTION_ERROR_MESSAGE_405,
        self::NOT_ACCEPTABLE => self::EXCEPTION_ERROR_MESSAGE_406,
        self::EXCEEDED_QPS_LIMITATION => self::EXCEPTION_ERROR_MESSAGE_429,
        self::INTERNAL_SERVER_ERROR => self::EXCEPTION_ERROR_MESSAGE_500,
        self::HTTP_NOT_IMPLEMENTED => self::EXCEPTION_ERROR_MESSAGE_501,
        self::SERVICE_UNAVAILABLE => self::EXCEPTION_ERROR_MESSAGE_503,
    ];
}

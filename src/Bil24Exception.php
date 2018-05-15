<?php

namespace bil24api;

class Bil24Exception extends \Exception
{
    const UNKNOWN_ERROR = -1;
    const SESSION_EXPIRED = 1;
    const STANDARD_MESSAGE = 101;
    const MAIL_NOT_BOUND = 102;

    public static $descriptions = [
        self::UNKNOWN_ERROR => 'Unknown error',
        self::SESSION_EXPIRED => 'Session expired',
        self::STANDARD_MESSAGE => 'Standard message',
        self::MAIL_NOT_BOUND => 'Mail not bound',
    ];
}

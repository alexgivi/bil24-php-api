<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class Auth extends BaseResponseObject
{
    /**
     * id пользователя в БС.
     *
     * @var int
     */
    public $userId;

    /**
     * id сессии пользователя.
     *
     * @var string
     */
    public $sessionId;

    /**
     * тип фронтенда.
     *
     * @var int
     */
    public $frontendType;
}
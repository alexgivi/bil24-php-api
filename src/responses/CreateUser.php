<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class CreateUser extends BaseResponseObject
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
}
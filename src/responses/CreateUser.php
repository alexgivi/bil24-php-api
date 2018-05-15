<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class CreateUser extends BaseResponseObject
{
    /**
     * @var int
     */
    public $userId;

    /**
     * @var string
     */
    public $sessionId;
}
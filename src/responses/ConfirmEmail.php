<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class ConfirmEmail extends BaseResponseObject
{
    /**
     * id пользователя.
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
     * прикрепленный email.
     *
     * @var string
     */
    public $email;
}
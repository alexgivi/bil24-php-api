<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetEmail extends BaseResponseObject
{
    /**
     * почта пользователя.
     *
     * @var string
     */
    public $email;

    /**
     * true - отправлять билеты на почту.
     *
     * @var string
     */
    public $needSendTicketEmail;
}
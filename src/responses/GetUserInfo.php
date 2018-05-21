<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetUserInfo extends BaseResponseObject
{
    /**
     * Кол-во забронированных мест.
     *
     * @var int
     */
    public $seatInReserve;

    /**
     * Кол-во незавершенных заказов.
     *
     * @var int
     */
    public $orderInWait;
}
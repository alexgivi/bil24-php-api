<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class Reservation extends BaseResponseObject
{
    /**
     * Тип резервирования, переданный в запросе.
     *
     * @var string
     */
    public $type;

    /**
     * Список всех забронированных мест пользователя.
     *
     * @var \bil24api\data\Seat[]
     */
    public $seatList = [];

    /**
     * Время жизни брони в секундах через которое вся бронь пользователя снимется.
     *
     * @var int
     */
    public $cartTimeout;
}
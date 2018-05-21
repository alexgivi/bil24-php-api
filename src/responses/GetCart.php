<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetCart extends BaseResponseObject
{
    /**
     * Общая сумма бронирования.
     *
     * @var float
     */
    public $totalSum;

    /**
     * Время жизни брони в секундах через которое вся бронь пользователя снимется.
     *
     * @var int
     */
    public $time;

    /**
     * сервисный сбор в корзине.
     *
     * @var float
     */
    public $totalServiceCharge;

    /**
     * список сеансов, на которые забронированы места.
     *
     * @var \bil24api\data\ActionEvent[]
     */
    public $actionEventList;
}
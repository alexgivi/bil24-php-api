<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class PayOrder extends BaseResponseObject
{
    /**
     * id заказа.
     *
     * @var int
     */
    public $orderId;

    /**
     * статус заказа.
     *
     * @var string
     */
    public $statusExtStr;

    /**
     * статус заказа.
     *
     * @var int
     */
    public $statusExtInt;
}
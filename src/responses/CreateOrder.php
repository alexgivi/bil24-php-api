<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class CreateOrder extends BaseResponseObject
{
    /**
     * ссылка для оплаты.
     *
     * @var string
     */
    public $formUrl;

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
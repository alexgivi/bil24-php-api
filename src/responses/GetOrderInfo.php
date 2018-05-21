<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetOrderInfo extends BaseResponseObject
{
    /**
     * id заказа, переданного в запросе.
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

    /**
     * список заказов.
     *
     * @var \bil24api\data\OrderInfo[]
     */
    public $orderInfoList = [];
}
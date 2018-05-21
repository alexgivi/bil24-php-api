<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetOrdersExt extends BaseResponseObject
{
    /**
     * список заказов.
     *
     * @var \bil24api\data\Order[]
     */
    public $orderList;

    /**
     * формат даты заказа.
     *
     * @var string
     */
    public $orderDatePattern;

    /**
     * формат даты билета.
     *
     * @var string
     */
    public $ticketDatePattern;
}
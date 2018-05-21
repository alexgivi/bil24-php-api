<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetOrders extends BaseResponseObject
{
    /**
     * список заказов.
     *
     * @var \bil24api\data\Order[]
     */
    public $orderList = [];
}
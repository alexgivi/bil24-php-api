<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetOrderInfo extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $orderId;

    public static function getCommand()
    {
        return 'GET_ORDER_INFO';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['orderId']);
    }
}
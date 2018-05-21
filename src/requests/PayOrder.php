<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class PayOrder extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $orderId;

    public static function getCommand()
    {
        return 'PAY_ORDER';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['orderId']);
    }
}
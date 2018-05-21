<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class CancelOrder extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $orderId;

    public static function getCommand()
    {
        return 'CANCEL_ORDER';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['orderId']);
    }
}
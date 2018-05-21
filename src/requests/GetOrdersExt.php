<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetOrdersExt extends AuthorizedRequestObject
{
    /**
     * @var string
     */
    public $fromDate;

    public static function getCommand()
    {
        return 'GET_ORDERS_EXT';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['fromDate']);
    }
}
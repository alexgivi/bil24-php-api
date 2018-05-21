<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetOrders extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'GET_ORDERS';
    }
}
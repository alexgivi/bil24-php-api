<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetCart extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'GET_CART';
    }
}
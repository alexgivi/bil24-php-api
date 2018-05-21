<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetFilter extends BaseRequestObject
{
    public static function getCommand()
    {
        return 'GET_FILTER';
    }
}
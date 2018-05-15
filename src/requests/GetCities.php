<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetCities extends BaseRequestObject
{
    public static function getCommand()
    {
        return 'GET_CITIES';
    }
}
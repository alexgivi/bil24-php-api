<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetVenueTypes extends BaseRequestObject
{
    public static function getCommand()
    {
        return 'GET_VENUE_TYPES';
    }
}
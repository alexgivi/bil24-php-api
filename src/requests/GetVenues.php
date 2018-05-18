<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetVenues extends BaseRequestObject
{
    /**
     * @var int
     */
    public $cityId;

    /**
     * @var int
     */
    public $venueTypeId;

    public static function getCommand()
    {
        return 'GET_VENUES';
    }

    public static function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['cityId']);
    }
}
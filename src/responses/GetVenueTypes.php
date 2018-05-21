<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetVenueTypes extends BaseResponseObject
{
    /**
     * список типов мест проведения.
     *
     * @var \bil24api\data\VenueType[]
     */
    public $venueTypeList = [];
}
<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetVenues extends BaseResponseObject
{
    /**
     * список мест проведения.
     *
     * @var \bil24api\data\Venue[]
     */
    public $venueList = [];
}
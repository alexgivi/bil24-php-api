<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetCities extends BaseResponseObject
{
    /**
     * список городов.
     *
     * @var \bil24api\data\City[]
     */
    public $cityList;
}
<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetFilter extends BaseResponseObject
{
    /**
     * список городов.
     *
     * @var \bil24api\data\City[]
     */
    public $cityList = [];

    /**
     * список видов.
     *
     * @var \bil24api\data\Kind[]
     */
    public $kindList = [];
}
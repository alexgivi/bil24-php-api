<?php

namespace bil24api\data;

use bil24api\BaseObject;

class City extends BaseObject
{
    /**
     * id города в БС.
     *
     * @var int
     */
    public $cityId;

    /**
     * наименование города в БС.
     *
     * @var string
     */
    public $cityName;

    /**
     * список представлений.
     *
     * @var \bil24api\data\Action[]
     */
    public $actionList = [];

    /**
     * список представлений.
     *
     * @var \bil24api\data\Venue[]
     */
    public $venueList = [];
}
<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Location extends BaseObject
{
    /**
     * сектор.
     *
     * @var string
     */
    public $sector;

    /**
     * ряд.
     *
     * @var string
     */
    public $row;

    /**
     * место.
     *
     * @var string
     */
    public $number;
}
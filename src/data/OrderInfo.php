<?php

namespace bil24api\data;

use bil24api\BaseObject;

class OrderInfo extends BaseObject
{
    /**
     * id представления.
     *
     * @var int
     */
    public $actionId;

    /**
     * название представления.
     *
     * @var string
     */
    public $actionName;

    /**
     * количество билетов.
     *
     * @var int
     */
    public $quantity;

    /**
     * общая сумма.
     *
     * @var float
     */
    public $sum;


    /**
     * url постера (320х335).
     *
     * @var string
     */
    public $smallPosterUrl;
}
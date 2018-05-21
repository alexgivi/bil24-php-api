<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Seat extends BaseObject
{
    /**
     * id места.
     *
     * @var int
     */
    public $seatId;

    /**
     * id ценовой категории.
     *
     * @var int
     */
    public $categoryPriceId;

    /**
     * номинальная стоимость.
     *
     * @var float
     */
    public $price;

    /**
     * сервисный сбор по месту.
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * если true, место имеет координаты.
     *
     * @var boolean
     */
    public $placement;

    /**
     * координаты места.
     *
     * @var \bil24api\data\Location|null
     */
    public $location;

    /**
     * название сектора.
     *
     * @var string
     */
    public $sector;

    /**
     * название ряда.
     *
     * @var string
     */
    public $row;

    /**
     * номер места.
     *
     * @var string
     */
    public $number;

    /**
     * если true, место доступно к продаже.
     *
     * @var boolean
     */
    public $available;
}
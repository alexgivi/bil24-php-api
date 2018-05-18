<?php

namespace bil24api\data;

use bil24api\BaseObject;

class CategoryPrice extends BaseObject
{
    /**
     * id ценовой категории.
     *
     * @var int
     */
    public $categoryPriceId;

    /**
     * наименование ценовой категории.
     *
     * @var string
     */
    public $categoryPriceName;

    /**
     * стоимость ценовой категории.
     *
     * @var float
     */
    public $price;

    /**
     * кол-во доступных мест в категории.
     *
     * @see CategoryLimit::$remainder
     * Если remainder отсутствует, то ориентируемся на availability.
     * Если remainder присутствует, то нужно внимательно использовать эти параметры.
     * К примеру общее ограничение remainder на 3 категории может быть 100,
     * но и в каждой категории availability также может быть 100.
     *
     * @var int
     */
    public $availability;
}
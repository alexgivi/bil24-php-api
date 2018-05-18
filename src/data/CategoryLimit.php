<?php

namespace bil24api\data;

use bil24api\BaseObject;

class CategoryLimit extends BaseObject
{
    /**
     * Общее ограничение мест по списку категорий.
     * Если параметр отсутствует, смотрим availability
     *
     * @see CategoryPrice::$availability.
     * Если remainder присутствует, то нужно внимательно использовать эти параметры.
     * К примеру общее ограничение remainder на 3 категории может быть 100,
     * но и в каждой категории availability также может быть 100.
     *
     * @var int|null
     */
    public $remainder;

    /**
     * список категорий, объединенные одним лимитом.
     *
     * @var \bil24api\data\CategoryPrice[]
     */
    public $categoryList = [];
}
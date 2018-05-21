<?php

namespace bil24api\data;

use bil24api\BaseObject;

class News extends BaseObject
{
    /**
     * id новости.
     *
     * @var int
     */
    public $id;

    /**
     * время новости в мс.
     *
     * @var int
     */
    public $unixTime;

    /**
     * дата в формате datePattern.
     *
     * @var string
     */
    public $date;

    /**
     * Заголовок новости.
     *
     * @var string
     */
    public $header;

    /**
     * Описание новости.
     *
     * @var string
     */
    public $fullDescription;
}
<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetNews extends BaseResponseObject
{
    /**
     * паттерн даты новости.
     *
     * @var string
     */
    public $datePattern;

    /**
     * cursorMode, переданный в запросе.
     *
     * @var string
     */
    public $cursorMode;

    /**
     * серверное время в мс.
     *
     * @var int
     */
    public $serverUnixTime;

    /**
     * true - последняя новость, false -  не посл новость.
     *
     * @var int
     */
    public $last;

    /**
     * список новостей.
     *
     * @var \bil24api\data\News[]
     */
    public $newsList = [];
}
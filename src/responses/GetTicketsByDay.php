<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetTicketsByDay extends BaseResponseObject
{
    /**
     * дата в формате dd.MM.yyyy.
     *
     * @var string
     */
    public $date;

    /**
     * список городов.
     *
     * @var \bil24api\data\City[]
     */
    public $cityList = [];

}
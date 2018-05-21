<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetSeatList extends BaseResponseObject
{
    /**
     * id сеанса.
     *
     * @var int
     */
    public $actionEventId;

    /**
     * если равно true, в ответе только доступные для продажи места.
     *
     * @var boolean
     */
    public $availableOnly;

    /**
     * список мест.
     *
     * @var \bil24api\data\Seat[]
     */
    public $seatList = [];
}
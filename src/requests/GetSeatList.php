<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetSeatList extends BaseRequestObject
{
    /**
     * @var int
     */
    public $actionEventId;

    /**
     * @var boolean
     */
    public $availableOnly;

    public static function getCommand()
    {
        return 'GET_SEAT_LIST';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['actionEventId']);
    }
}
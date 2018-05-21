<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetTicketsByDay extends BaseRequestObject
{
    /**
     * @var string
     */
    public $date;

    public static function getCommand()
    {
        return 'GET_TICKETS_BY_DAY';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['date']);
    }
}
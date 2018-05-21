<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class Delete extends AuthorizedRequestObject
{
    const DESTINATION_ORDER = "ORDER";
    const DESTINATION_TICKET = "TICKET";
    const DESTINATION_TICKETS_BY_ACTION_EVENT = "TICKETS_BY_ACTION_EVENT";

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $destination;

    public static function getCommand()
    {
        return 'DELETE';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['id', 'type']);
    }
}
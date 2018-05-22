<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class RefundTickets extends AuthorizedRequestObject
{
    /**
     * @var int[]
     */
    public $ticketIdSet;

    public static function getCommand()
    {
        return 'REFUND_TICKETS';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['ticketIdSet']);
    }
}
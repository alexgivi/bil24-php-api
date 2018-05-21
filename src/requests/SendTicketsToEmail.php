<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class SendTicketsToEmail extends AuthorizedRequestObject
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var int[]
     */
    public $ticketIdList;

    public static function getCommand()
    {
        return 'SEND_TICKETS_TO_EMAIL';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['email', 'ticketIdList']);
    }
}
<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetActionEventsGroupedByTickets extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'GET_ACTION_EVENTS_GROUPED_BY_TICKETS';
    }
}
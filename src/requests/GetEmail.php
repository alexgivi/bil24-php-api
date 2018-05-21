<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetEmail extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'GET_EMAIL';
    }
}
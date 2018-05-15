<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class Auth extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'AUTH';
    }
}
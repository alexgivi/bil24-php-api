<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetUserInfo extends AuthorizedRequestObject
{
    public static function getCommand()
    {
        return 'GET_USER_INFO';
    }
}
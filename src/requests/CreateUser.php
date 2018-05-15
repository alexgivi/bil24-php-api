<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class CreateUser extends BaseRequestObject
{
    public static function getCommand()
    {
        return 'CREATE_USER';
    }
}
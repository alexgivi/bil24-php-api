<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class SetPushToken extends AuthorizedRequestObject
{
    /**
     * @var string
     */
    public $pushToken;

    public static function getCommand()
    {
        return 'SET_PUSH_TOKEN';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['pushToken']);
    }
}
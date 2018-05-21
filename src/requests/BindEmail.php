<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class BindEmail extends AuthorizedRequestObject
{
    /**
     * @var string
     */
    public $email;

    public static function getCommand()
    {
        return 'BIND_EMAIL';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['email']);
    }
}
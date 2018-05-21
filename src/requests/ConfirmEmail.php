<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class ConfirmEmail extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $code;

    public static function getCommand()
    {
        return 'CONFIRM_EMAIL';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['code']);
    }
}
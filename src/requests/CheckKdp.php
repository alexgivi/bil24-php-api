<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class CheckKdp extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $actionId;

    /**
     * @var int
     */
    public $kdp;

    public static function getCommand()
    {
        return 'CHECK_KDP';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['actionId', 'kdp']);
    }
}
<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetNews extends AuthorizedRequestObject
{
    const CURSOR_FORWARD = "forward";
    const CURSOR_BACKWARD = "backward";

    /**
     * @var int
     */
    public $time;

    /**
     * @var int
     */
    public $count;

    /**
     * @var string
     */
    public $cursorMode;

    public static function getCommand()
    {
        return 'GET_NEWS';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['time', 'count', 'cursorMode']);
    }
}
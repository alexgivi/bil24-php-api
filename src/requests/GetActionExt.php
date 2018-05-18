<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetActionExt extends BaseRequestObject
{
    /**
     * @var int
     */
    public $cityId;

    /**
     * @var int
     */
    public $actionId;

    /**
     * @var int
     */
    public $userId;

    public static function getCommand()
    {
        return 'GET_ACTION_EXT';
    }

    public static function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['cityId', 'actionId']);
    }
}
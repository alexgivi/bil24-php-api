<?php

namespace bil24api\requests;

use bil24api\BaseRequestObject;

class GetActionsV2 extends BaseRequestObject
{
    /**
     * @var int
     */
    public $cityId;

    public static function getCommand()
    {
        return 'GET_ACTIONS_V2';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['cityId']);
    }
}
<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetActionsV2 extends BaseResponseObject
{
    /**
     * список мероприятий.
     *
     * @var \bil24api\data\Action[]
     */
    public $actionList = [];
}
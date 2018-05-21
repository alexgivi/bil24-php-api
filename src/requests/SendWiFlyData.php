<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class SendWiFlyData extends AuthorizedRequestObject
{
    /**
     * @var string
     */
    public $mac;

    public static function getCommand()
    {
        return 'SEND_WI_FLY_DATA';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['mac']);
    }
}
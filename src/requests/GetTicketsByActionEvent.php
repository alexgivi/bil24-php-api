<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetTicketsByActionEvent extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $actionEventId;

    /**
     * @var int
     */
    public $sizeQrCode;

    /**
     * @var int
     */
    public $widthBarCode;

    /**
     * @var int
     */
    public $heightBarCode;

    /**
     * @var string
     */
    public $type;

    public static function getCommand()
    {
        return 'GET_TICKETS_BY_ACTION_EVENT';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), [
            'actionEventId',
            'sizeQrCode',
            'widthBarCode',
            'heightBarCode',
            'type'
        ]);
    }
}
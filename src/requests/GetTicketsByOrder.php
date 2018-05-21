<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetTicketsByOrder extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $orderId;

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
        return 'GET_TICKETS_BY_ORDER';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['orderId']);
    }
}
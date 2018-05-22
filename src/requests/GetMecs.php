<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class GetMecs extends AuthorizedRequestObject
{
    /**
     * @var int
     */
    public $mecId;

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

    public static function getCommand()
    {
        return 'GET_MECS';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['sizeQrCode', 'widthBarCode', 'heightBarCode']);
    }
}
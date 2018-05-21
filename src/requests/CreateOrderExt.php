<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class CreateOrderExt extends AuthorizedRequestObject
{
    /**
     * @var boolean
     */
    public $longReservation;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $fullName;

    public static function getCommand()
    {
        return 'CREATE_ORDER_EXT';
    }
}
<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class CreateOrder extends AuthorizedRequestObject
{
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

    /**
     * @var string
     */
    public $successUrl;

    /**
     * @var string
     */
    public $failUrl;

    /**
     * @var float
     */
    public $discount;

    /**
     * @var float
     */
    public $serviceCharge;

    public static function getCommand()
    {
        return 'CREATE_ORDER';
    }

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['successUrl', 'failUrl']);
    }
}
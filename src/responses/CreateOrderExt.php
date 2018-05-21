<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class CreateOrderExt extends BaseResponseObject
{
    /**
     * id заказа.
     *
     * @var int
     */
    public $orderId;

    /**
     * скидка в рублях.
     *
     * @var float
     */
    public $discount;

    /**
     * сервисный сбор (СС) в рублях.
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * сумма заказа, номинал, без учета скидки и СС.
     *
     * @var float
     */
    public $sum;

    /**
     * общая сумма.
     *
     * @var float
     */
    public $totalSum;

    /**
     * кол-во билетов в заказе.
     *
     * @var int
     */
    public $quantity;

    /**
     * время жизни заказа.
     *
     * @var int
     */
    public $orderTimeout;
}
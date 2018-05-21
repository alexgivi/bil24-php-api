<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetTicketsByOrder extends BaseResponseObject
{
    /**
     * формат даты заказа (например: dd.MM.yyyy HH:mm:ss).
     *
     * @var string
     */
    public $orderDatePattern;

    /**
     * формат даты сеанса  в билете (например: dd.MM.yyyy HH:mm).
     *
     * @var string
     */
    public $actionEventDatePattern;

    /**
     * id заказа, переданный в запросе.
     *
     * @var int
     */
    public $orderId;

    /**
     * дата заказа в формате orderDatePattern.
     *
     * @var int
     */
    public $date;

    /**
     * скидка.
     *
     * @var float
     */
    public $discount;

    /**
     * сервисный сбор (СС).
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * сумма без СС.
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
     * кол-во билетов.
     *
     * @var float
     */
    public $quantity;

    /**
     * статус заказа.
     *
     * @var string
     */
    public $statusExtStr;

    /**
     * статус заказа.
     *
     * @var int
     */
    public $statusExtInt;

    /**
     * список билетов.
     *
     * @var \bil24api\data\Ticket[]
     */
    public $ticketList = [];

}
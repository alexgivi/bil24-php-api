<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Order extends BaseObject
{
    /**
     * Новый заказ/ожидание оплаты
     */
    const STATUS_STR_NEW = 'NEW';

    /**
     * Обработка оплаченного заказа
     */
    const STATUS_STR_PROCESSING = 'PROCESSING';

    /**
     * Завершен
     */
    const STATUS_STR_PAID = 'PAID';

    /**
     * Отмена неоплаченного заказа
     */
    const STATUS_STR_CANCELLING = 'CANCELLING';

    /**
     * Отменен
     */
    const STATUS_STR_CANCELLED = 'CANCELLED';

    const STATUS_INT_NEW = 0;
    const STATUS_INT_PROCESSING = 1;
    const STATUS_INT_PAID = 2;
    const STATUS_INT_CANCELLING = -1;
    const STATUS_INT_CANCELLED = -2;

    /**
     * id заказа в БС.
     *
     * @var int
     */
    public $orderId;

    /**
     * дата создания заказа в формате datePattern.
     *
     * @var string
     */
    public $date;

    /**
     * формат даты.
     *
     * @var string
     */
    public $datePattern;

    /**
     * скидка в рублях.
     *
     * @var float
     */
    public $discount;

    /**
     * сервисный сбор в рублях.
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * сумма заказа.
     *
     * @var float
     */
    public $sum;

    /**
     * кол-во билетов в заказе.
     *
     * @var int
     */
    public $quantity;

    /**
     * список билетов.
     *
     * @var \bil24api\data\Ticket[]
     */
    public $ticketList = [];

    /**
     * сообщение пользователю от банка.
     *
     * @var string
     */
    public $userMessage;

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
     * ссылка для оплаты.
     *
     * @var string
     */
    public $formUrl;

}
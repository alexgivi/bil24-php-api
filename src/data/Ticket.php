<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Ticket extends BaseObject
{
    const STATUS_INT_NOT_USED = 0;
    const STATUS_INT_IN = 1;
    const STATUS_INT_OUT = 2;
    const STATUS_INT_RETURN = 3;
    const STATUS_INT_RETURN_VBS = 4;
    const STATUS_INT_ACCEPT_CONTROLLER = 5;

    const STATUS_STR_NOT_USED = 'Не использовал';
    const STATUS_STR_IN = 'Вошел';
    const STATUS_STR_OUT = 'Вышел';
    const STATUS_STR_RETURN = 'Вернул билет';
    const STATUS_STR_RETURN_VBS = 'Возврат билета в ВБС';
    const STATUS_STR_ACCEPT_CONTROLLER = 'Впустил контроллер';

    /**
     * id билета.
     *
     * @var int
     */
    public $ticketId;

    /**
     * id места.
     *
     * @var int
     */
    public $seatId;

    /**
     * дата представления.
     *
     * @var string
     */
    public $date;

    /**
     * наименование места проведения.
     *
     * @var string
     */
    public $venueName;

    /**
     * адрес места проведения.
     *
     * @var string
     */
    public $venueAddress;

    /**
     * название представления.
     *
     * @var string
     */
    public $actionName;

    /**
     * сектор (Сектор В2).
     *
     * @var string
     */
    public $sector;

    /**
     * ряд (Ряд 4).
     *
     * @var string
     */
    public $row;

    /**
     * место(Место 5).
     *
     * @var string
     */
    public $number;

    /**
     * информация о категории места.
     *
     * @var string
     */
    public $categoryName;

    /**
     * цена билета.
     *
     * @var float
     */
    public $price;

    /**
     * цена билета с учетом СС.
     *
     * @var float
     */
    public $totalPrice;

    /**
     * СС.
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * Qr код в Base64 в формате переданном в запросе.
     *
     * @var string
     */
    public $qrCodeImg;

    /**
     * Bar код в Base64 в формате переданном в запросе.
     *
     * @var string
     */
    public $barCodeImg;

    /**
     * значение штрихкода.
     *
     * @var string
     */
    public $barCodeNumber;

    /**
     * тип штрихкода.
     *
     * @var string
     */
    public $barCodeType;

    /**
     * url постера (320х335).
     *
     * @var string
     */
    public $smallPosterUrl;

    /**
     * Данные организатора.
     *
     * @var string
     */
    public $legalOwner;

    /**
     * Возрастное ограничение.
     *
     * @var string
     */
    public $age;

    /**
     * статус билета.
     *
     * @var int
     */
    public $statusInt;

    /**
     * статус билета.
     *
     * @var string
     */
    public $statusStr;
}
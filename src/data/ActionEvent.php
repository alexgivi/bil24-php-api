<?php

namespace bil24api\data;

use bil24api\BaseObject;

/**
 * Существует 3 вида схем:
 * 1. Только без размещения. placementUrl будет отсутствовать, смотрим categoryLimitList.
 * 2. Только с размещением. Смотрим placementUrl, categoryLimitList будет пустой.
 * 3. Комбинированная. Смотрим placementUrl и categoryLimitList.
 */
class ActionEvent extends BaseObject
{
    /**
     * id сеанса.
     *
     * @var int
     */
    public $actionEventId;

    /**
     * дата проведения сеанса в формате dd.MM.yyyy.
     *
     * @var string
     */
    public $day;

    /**
     * время проведения сеанса в формате HH:mm.
     *
     * @var string
     */
    public $time;

    /**
     * id представления.
     *
     * @var int
     */
    public $actionId;

    /**
     * краткое наименование представления.
     *
     * @var string
     */
    public $actionName;

    /**
     * полное наименование представления.
     *
     * @var string
     */
    public $fullActionName;

    /**
     * url постера (320 х 335).
     *
     * @var string
     */
    public $smallPosterUrl;

    /**
     * url постера (640 х 670).
     *
     * @var string
     */
    public $bigPosterUrl;

    /**
     * id города, переданный в запросе.
     *
     * @var int
     */
    public $cityId;

    /**
     * наименование города.
     *
     * @var string
     */
    public $cityName;

    /**
     * id места проведения.
     *
     * @var int
     */
    public $venueId;

    /**
     * наименование места проведения.
     *
     * @var string
     */
    public $venueName;

    /**
     * список забронированных мест.
     *
     * @var \bil24api\data\Seat[]
     */
    public $seatList = [];

    /**
     * кол-во билетов.
     *
     * @var int
     */
    public $quantity;

    /**
     * общая сумма билетов.
     *
     * @var int
     */
    public $sum;

    /**
     * ссылка на билеты в формате pdf.
     *
     * @var int
     */
    public $ticketsUrl;

    /**
     * сервисный сбор по сеансу.
     *
     * @var float
     */
    public $serviceCharge;

    /**
     * id схемы зала.
     *
     * @var int
     */
    public $seatingPlanId;

    /**
     * название схемы зала.
     *
     * @var string
     */
    public $seatingPlanName;

    /**
     * ссылка на схему зала.
     * если поле отсутствует, схема зала без размещения.
     *
     * @var string
     */
    public $placementUrl;

    /**
     * false - МЭБ на контроле представления не принимается.
     *
     * @var boolean
     */
    public $eTicket;

    /**
     * список категорий, сгруппированных по лимитам (категории без размещения).
     *
     * @var \bil24api\data\CategoryLimit[]
     */
    public $categoryLimitList = [];

    /**
     * список билетов.
     *
     * @var \bil24api\data\Ticket[]
     */
    public $ticketList = [];
}
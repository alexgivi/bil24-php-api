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
    public $seatList;

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
     * наименование типа места проведения.
     *
     * @var string
     */
    public $categoryLimitList;

    /**
     * адрес места проведения.
     *
     * @var string
     */
    public $address;

    /**
     * строка (##.######).
     * широта места проведения.
     *
     * @var string
     */
    public $geoLat;

    /**
     * строка (##.######).
     * долгота места проведения.
     *
     * @var string
     */
    public $geoLon;

    /**
     * ссылка на изображение места проведения.
     *
     * @var string
     */
    public $imageUrl;

    /**
     * описание места проведения.
     *
     * @var string
     */
    public $description;

    /**
     * true - место проведения, где действуют скидки и преференции.
     *
     * @var boolean
     */
    public $cityPass;

    /**
     * true - место проведения, где действуют скидки и преференции.
     *
     * @var boolean
     */
    public $actionEventList;

}
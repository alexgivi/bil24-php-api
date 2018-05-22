<?php

namespace bil24api\data;

use bil24api\BaseObject;

class ActionCard extends BaseObject
{
    /**
     * id сеанса.
     *
     * @var int
     */
    public $actionEventId;

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
     * ссылка на постер.
     *
     * @var string
     */
    public $bigPosterUrl;

    /**
     * ссылка на постер.
     *
     * @var string
     */
    public $smallPosterUrl;

    /**
     * id города.
     *
     * @var int
     */
    public $cityId;

    /**
     * название города.
     *
     * @var string
     */
    public $cityName;

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
     * true - место проведение, где действуют скидки и преференции.
     *
     * @var boolean
     */
    public $cityPass;

    /**
     * кол-во карт.
     *
     * @var int
     */
    public $quantity;

    /**
     * общая сумма карт.
     *
     * @var float
     */
    public $totalSum;

    /**
     * массив карт по представлению.
     *
     * @var \bil24api\data\Mec[]
     */
    public $mecList = [];
}
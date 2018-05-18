<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Venue extends BaseObject
{
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
     * id типа места проведения.
     *
     * @var int
     */
    public $venueTypeId;

    /**
     * наименование типа места проведения.
     *
     * @var string
     */
    public $venueTypeName;

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
     * список сеансов.
     *
     * @var \bil24api\data\ActionEvent[]
     */
    public $actionEventList = [];

}
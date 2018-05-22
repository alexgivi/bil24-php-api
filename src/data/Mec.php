<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Mec extends BaseObject
{
    /**
     * id карты.
     *
     * @var int
     */
    public $mecId;

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
}
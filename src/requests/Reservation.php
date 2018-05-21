<?php

namespace bil24api\requests;

use bil24api\AuthorizedRequestObject;

class Reservation extends AuthorizedRequestObject
{
    const TYPE_RESERVE_BY_PLACE = "RESERVE_BY_PLACE";
    const TYPE_RESERVE = "RESERVE";
    const TYPE_UN_RESERVE = "UN_RESERVE";
    const TYPE_UN_RESERVE_ALL = "UN_RESERVE_ALL";

    /**
     * @var string
     */
    public $type;

    /**
     * @var int[]
     */
    public $seatList;

    /**
     * @var array
     */
    public $categoryQuantityMap;

    /**
     * @var int
     */
    public $kdp;

    /**
     * @var int
     */
    public $actionEventId;

    public static function getCommand()
    {
        return 'RESERVATION';
    }

    public function getRequiredAttributes()
    {
        $required = array_merge(parent::getRequiredAttributes(), ['type']);

        switch ($this->type) {
            case self::TYPE_RESERVE_BY_PLACE:
            case self::TYPE_UN_RESERVE:
                $required[] = 'seatList';
                break;

            case self::TYPE_RESERVE:
                $required[] = 'categoryQuantityMap';
                break;
        }

        return $required;
    }
}
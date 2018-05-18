<?php

namespace bil24api\data;

use bil24api\BaseObject;

class VenueType extends BaseObject
{
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
}
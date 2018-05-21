<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Kind extends BaseObject
{
    /**
     * id вида.
     *
     * @var int
     */
    public $kindId;

    /**
     * наименование вида.
     *
     * @var string
     */
    public $kindName;
}
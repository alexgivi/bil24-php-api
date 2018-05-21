<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class Delete extends BaseResponseObject
{
    /**
     * id элемента, который передавался в запросе.
     *
     * @var int
     */
    public $id;

    /**
     * destination, который передавался в запросе.
     *
     * @var string
     */
    public $destination;
}
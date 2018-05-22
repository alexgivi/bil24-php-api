<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetMecs extends BaseResponseObject
{
    /**
     * массив с данными карт.
     *
     * @var \bil24api\data\ActionCard[]
     */
    public $list = [];
}
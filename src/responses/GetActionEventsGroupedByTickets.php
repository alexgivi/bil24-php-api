<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetActionEventsGroupedByTickets extends BaseResponseObject
{
    /**
     * список заказов.
     *
     * @var \bil24api\data\ActionEvent[]
     */
    public $list;

    /**
     * шаблон дня сеанса (dd.MM.yyyy).
     *
     * @var string
     */
    public $dayPattern;

    /**
     * шаблон времени сеанса (HH:mm).
     *
     * @var string
     */
    public $timePattern;
}
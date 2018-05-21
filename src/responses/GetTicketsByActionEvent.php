<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class GetTicketsByActionEvent extends BaseResponseObject
{
    /**
     * формат даты в билете (пример: dd.MM.yyyy HH:mm).
     *
     * @var string
     */
    public $datePattern;

    /**
     * id представления, переданный в запросе.
     *
     * @var int
     */
    public $actionId;

    /**
     * Имя представления.
     *
     * @var int
     */
    public $actionName;

    /**
     * список билетов.
     *
     * @var \bil24api\data\Ticket[]
     */
    public $ticketList = [];

}
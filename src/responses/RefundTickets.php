<?php

namespace bil24api\responses;

use bil24api\BaseResponseObject;

class RefundTickets extends BaseResponseObject
{
    /**
     * невозможно вернуть.
     */
    const STATUS_IMPOSSIBLE = 1;

    /**
     * в процессе возврата.
     */
    const STATUS_IN_PROGRESS = 2;

    /**
     * билет возвращен.
     */
    const STATUS_REFUNDED = 3;

    /**
     * key - id билета, переданного в запросе. value - число, статус возврата.
     *
     * @var array
     */
    public $statusMap = [];

    public function setStatusMap($data)
    {
        $this->statusMap = get_object_vars($data);
    }
}
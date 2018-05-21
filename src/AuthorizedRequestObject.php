<?php

namespace bil24api;

abstract class AuthorizedRequestObject extends BaseRequestObject
{
    /**
     * For methods with authorization calls - User id.
     *
     * @var int
     */
    public $userId;

    /**
     * For methods with authorization calls - User session id.
     *
     * @var string
     */
    public $sessionId;

    public function getRequiredAttributes()
    {
        return array_merge(parent::getRequiredAttributes(), ['userId', 'sessionId']);
    }
}
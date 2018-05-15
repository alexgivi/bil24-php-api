<?php

namespace bil24api;

abstract class BaseResponseObject extends BaseObject
{
    /**
     * Executed command.
     *
     * @var string
     */
    public $command;

    /**
     * Result code.
     *
     * @var int
     */
    public $resultCode;

    /**
     * Result message.
     *
     * @var string
     */
    public $description;
}
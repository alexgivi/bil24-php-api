<?php

namespace bil24api;

class Configuration extends BaseObject
{
    /**
     * Bil24 api url. Default - test api url.
     *
     * @var string
     */
    public $apiUrl = "https://api.bil24.ru:1240/json";

    /**
     * Client version.
     *
     * @var string
     */
    public $versionCode = "1.0";

    /**
     * Frontend id.
     *
     * @var int
     */
    public $fid;

    /**
     * Frontend token.
     *
     * @var string
     */
    public $token;

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

    /**
     * Configuration constructor.
     *
     * @param array $parameters Associative array of configuration parameters.
     */
    public function __construct($parameters = [])
    {
        parent::__construct($parameters);
    }
}
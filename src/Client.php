<?php

namespace bil24api;

use bil24api\requests\Auth;
use bil24api\requests\CreateUser;
use bil24api\requests\GetCities;

/**
 * Interact bil24 server with REST API.
 */
class Client
{
    /**
     * Json Mapper.
     *
     * @var \JsonMapper
     */
    protected $jsonMapper;

    /**
     * Http client
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Configuration container
     *
     * @var Configuration
     */
    protected $configuration;

    /**
     * Constructor.
     *
     * @param Configuration|array|null $configuration
     */
    public function __construct($configuration = null)
    {
        if ($configuration === null) {
            $configuration = new Configuration();
        } elseif (is_array($configuration)) {
            $configuration = new Configuration($configuration);
        }

        $this->configuration = $configuration;
        $this->jsonMapper = new \JsonMapper();
        $this->httpClient = new \GuzzleHttp\Client();
    }

    /**
     * Execute REST request.
     *
     * @param BaseRequestObject $dataObject
     * @param string            $resultClass
     *
     * @return BaseResponseObject|object
     *
     * @throws \JsonMapper_Exception
     * @throws Bil24Exception
     */
    protected function exec($dataObject, $resultClass)
    {
        $dataObject->check();

        $response = $this->httpClient->post($this->configuration->apiUrl, [
            'json' => $dataObject->toArray()
        ]);

        /** @var BaseResponseObject $object */
        $object = $this->jsonMapper->map(json_decode($response->getBody()->getContents()), new $resultClass);
        if ($object->resultCode !== 0) {
            throw new Bil24Exception($object->description, $object->resultCode);
        }

        return $object;
    }

    /**
     * Авторизация пользователя.
     * Для интерфейса Билетная система вместо данного метода необходимо использовать метод CREATE_USER.
     *
     * @return \bil24api\responses\Auth|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function auth()
    {
        return $this->exec(Auth::create($this->configuration), \bil24api\responses\Auth::class);
    }

    /**
     * Метод создает нового пользователя, который в дальнейшем может использоваться для бронирования мест,
     * создания и оплаты заказа и получения билетов.
     * Используется вместо метода AUTH для интерфейса Билетная система.
     * *только для интерфейса Билетная система
     *
     * @return \bil24api\responses\CreateUser|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function createUser()
    {
        return $this->exec(CreateUser::create($this->configuration), \bil24api\responses\CreateUser::class);
    }

    /**
     * Получение списка всех городов, присутствующих в системе.
     * Для получения списка только тех городов, в которых есть актуальные события,
     * необходимо использовать метод GET_FILTER.
     * Использование метода GET_FILTER является предпочтительным.
     *
     * @return \bil24api\responses\GetCities|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getCities()
    {
        return $this->exec(GetCities::create($this->configuration), \bil24api\responses\GetCities::class);
    }
}

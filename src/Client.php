<?php

namespace bil24api;

use bil24api\requests\Auth;
use bil24api\requests\CreateUser;
use bil24api\requests\GetActionExt;
use bil24api\requests\GetCities;
use bil24api\requests\GetActionsV2;
use bil24api\requests\GetVenues;

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
     * Авторизация не обязательна.
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
     * Авторизация не требуется.
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
     * Авторизация не требуется.
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

    /**
     * Получение списка всех мест проведения, присутствующих в системе.
     * Для получения актуальных мест проведения, необходимо использовать метод GET_FILTER.
     *
     * Авторизация не требуется.
     *
     * @param int      $cityId      id города в БС.
     * @param int|null $venueTypeId Тип мест проведения, если не указан, в ответе будут все места проведения в городе.
     *
     * @return \bil24api\responses\GetVenues|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getVenues($cityId, $venueTypeId = null)
    {
        return $this->exec(GetVenues::create($this->configuration, [
            'cityId' => $cityId,
            'venueTypeId' => $venueTypeId,
        ]), \bil24api\responses\GetVenues::class);
    }

    /**
     * Получение списка мероприятий.
     * Метод возвращает список представлений по городу.
     *
     * Авторизация не требуется.
     *
     * @param int $cityId id города.
     *
     * @return \bil24api\responses\GetActionsV2|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getActionsV2($cityId)
    {
        return $this->exec(GetActionsV2::create($this->configuration, [
            'cityId' => $cityId,
        ]), \bil24api\responses\GetActionsV2::class);
    }

    /**
     * Получение списка мероприятий.
     * Метод возвращает список представлений по городу.
     *
     * Авторизация не требуется.
     *
     * @param int      $cityId   id города.
     * @param int      $actionId id представления
     * @param int|null $userId   id пользователя. на схеме зала будут окрашены места данного пользователя.
     *
     * @return \bil24api\responses\GetActionExt|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getActionExt($cityId, $actionId, $userId = null)
    {
        return $this->exec(GetActionExt::create($this->configuration, [
            'cityId' => $cityId,
            'actionId' => $actionId,
            'userId' => $userId,
        ]), \bil24api\responses\GetActionExt::class);
    }
}

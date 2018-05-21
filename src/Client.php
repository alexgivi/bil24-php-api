<?php

namespace bil24api;

use bil24api\requests\Auth;
use bil24api\requests\CancelOrder;
use bil24api\requests\CreateOrder;
use bil24api\requests\CreateOrderExt;
use bil24api\requests\CreateUser;
use bil24api\requests\GetActionEventsGroupedByTickets;
use bil24api\requests\GetActionExt;
use bil24api\requests\GetCart;
use bil24api\requests\GetCities;
use bil24api\requests\GetActionsV2;
use bil24api\requests\GetOrders;
use bil24api\requests\GetOrdersExt;
use bil24api\requests\GetSeatList;
use bil24api\requests\GetTicketsByActionEvent;
use bil24api\requests\GetTicketsByOrder;
use bil24api\requests\GetVenues;
use bil24api\requests\PayOrder;
use bil24api\requests\Reservation;

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

    /**
     * Получение списка мероприятий.
     * Метод возвращает список представлений по городу.
     *
     * Авторизация не требуется.
     *
     * @param int       $actionEventId
     * @param bool|null $availableOnly
     *
     * @return \bil24api\responses\GetSeatList|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getSeatList($actionEventId, $availableOnly = null)
    {
        return $this->exec(GetSeatList::create($this->configuration, [
            'actionEventId' => $actionEventId,
            'availableOnly' => $availableOnly,
        ]), \bil24api\responses\GetSeatList::class);
    }

    /**
     * Бронирование мест в схеме зала с размещением.
     * Перед созданием заказа необходимо забронировать хотя бы одно место.
     * При получении ошибки в ответе гарантируется, что ни одно место
     * из списка не было забронировано (транзакционные свойства бронирования).
     * Если список мест содержит ранее успешно забронированные места, они исключаются из списка.
     * Все места в списке должны принадлежать одному сеансу.
     *
     * Авторизация обязательна.
     *
     * @param int[]    $seatList список id мест для брони.
     * @param int|null $kdp      код доступа к представлению (КДП).
     *
     * @return \bil24api\responses\Reservation|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function reservationByPlace($seatList, $kdp = null)
    {
        return $this->exec(Reservation::create($this->configuration, [
            'type' => Reservation::TYPE_RESERVE_BY_PLACE,
            'seatList' => $seatList,
            'kdp' => $kdp,
        ]), \bil24api\responses\Reservation::class);
    }

    /**
     * Бронирование мест в схеме зала без размещения.
     * Перед созданием заказа необходимо забронировать хотя бы одно место.
     * При получении ошибки в ответе гарантируется, что ни одно место
     * из спискане было забронировано (транзакционные свойства бронирования).
     * Бронирование производится указанием ценовой категории и количества мест в данной категории.
     * При одновременном бронировании мест в нескольких ценовых категориях,
     * все ценовые категории должны принадлежать одному сеансу.
     * Ценовые категории должны быть без размещения,
     * в противном случае необходимо использовать метод бронирования мест в схеме зала с размещением.
     *
     * Авторизация обязательна.
     *
     * @param int[]    $categoryQuantityMap key - id категории, value - кол-во мест для брони.
     * @param int|null $kdp                 код доступа к представлению (КДП).
     *
     * @return \bil24api\responses\Reservation|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function reservationByPriceCategory($categoryQuantityMap, $kdp = null)
    {
        return $this->exec(Reservation::create($this->configuration, [
            'type' => Reservation::TYPE_RESERVE,
            'categoryQuantityMap' => $categoryQuantityMap,
            'kdp' => $kdp,
        ]), \bil24api\responses\Reservation::class);
    }

    /**
     * Разбронирование места.
     * Передается список мест, которые необходимо убрать из забронированных.
     *
     * Авторизация обязательна.
     *
     * @param int[] $seatList список id мест.
     *
     * @return \bil24api\responses\Reservation|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function unreserve($seatList)
    {
        return $this->exec(Reservation::create($this->configuration, [
            'type' => Reservation::TYPE_UN_RESERVE,
            'seatList' => $seatList,
        ]), \bil24api\responses\Reservation::class);
    }

    /**
     * Разбронирование всех мест.
     * Можно передать id сеанса, с которого снимается бронь.
     * Если не передавать id сеанса, то бронь снимается со всех забронированных мест.
     *
     * Авторизация обязательна.
     *
     * @param int|null $actionEventId id сеанса.
     *
     * @return \bil24api\responses\Reservation|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function unreserveAll($actionEventId = null)
    {
        return $this->exec(Reservation::create($this->configuration, [
            'type' => Reservation::TYPE_UN_RESERVE,
            'actionEventId' => $actionEventId,
        ]), \bil24api\responses\Reservation::class);
    }

    /**
     * Метод возвращает места, забронированные пользователям, сгруппированные по сеансу.
     *
     * Авторизация обязательна.
     *
     * @return \bil24api\responses\GetCart|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getCart()
    {
        return $this->exec(GetCart::create($this->configuration), \bil24api\responses\GetCart::class);
    }

    /**
     * Создание заказа из забронированных мест.
     * Для интерфейса Билетная система вместо данного метода необходимо использовать метод createOrderExt().
     *
     * Авторизация обязательна.
     *
     * @see Client::createOrderExt()
     *
     * @param string      $successUrl    редирект на successUrl после успешной оплаты
     * @param string      $failUrl       редирект на failUrl после НЕуспешной оплаты
     * @param string|null $email         почта, на которую надо отправить билеты после успешной оплаты (ТОЛЬКО ДЛЯ КАССЫ и ПРИГЛАСИТЕЛЬНЫХ)
     * @param string|null $phone         номер телефона покупателя (ТОЛЬКО ДЛЯ КАССЫ и ПРИГЛАСИТЕЛЬНЫХ)
     * @param string|null $fullName      Полное имя покупателя, которое отобразится на билете
     * @param float|null  $discount      скидка в % (ТОЛЬКО ДЛЯ КАСС И ПРИГЛАСИТЕЛЬНЫХ)
     * @param float|null  $serviceCharge сервисный сбор в % (ТОЛЬКО ДЛЯ КАСС)
     *
     * @return \bil24api\responses\CreateOrder|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function createOrder(
        $successUrl,
        $failUrl,
        $email = null,
        $phone = null,
        $fullName = null,
        $discount = null,
        $serviceCharge = null
    )
    {
        return $this->exec(CreateOrder::create($this->configuration, [
            'successUrl' => $successUrl,
            'failUrl' => $failUrl,
            'email' => $email,
            'phone' => $phone,
            'fullName' => $fullName,
            'discount' => $discount,
            'serviceCharge' => $serviceCharge,
        ]), \bil24api\responses\CreateOrder::class);
    }

    /**
     * Создание заказа из забронированных мест.
     * Используется вместо метода createOrder() для интерфейса Билетная система.
     * После создания заказ принимает статус NEW.
     *
     * Авторизация обязательна.
     *
     * @see Client::createOrder()
     *
     * @param bool|null   $longReservation true - долговременное бронирование
     * @param string|null $email           почта, на которую надо отправить билеты после успешной оплаты
     * @param string|null $phone           номер телефона покупателя
     * @param string|null $fullName        Полное имя покупателя, которое отобразится на билете
     *
     * @return \bil24api\responses\CreateOrderExt|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function createOrderExt($longReservation = null, $email = null, $phone = null, $fullName = null)
    {
        return $this->exec(CreateOrderExt::create($this->configuration, [
            'longReservation' => $longReservation,
            'email' => $email,
            'phone' => $phone,
            'fullName' => $fullName,
        ]), \bil24api\responses\CreateOrderExt::class);
    }

    /**
     * Отмена ранее созданного заказа.
     * Отменить можно только заказ со статусом NEW.
     * В результате запроса заказ примет статус CANCELLING или CANCELLED.
     * При попытке отменить заказ не со статусом NEW, ошибки не произойдет,
     * статус заказа не изменится, а в ответе придет актуальный статус заказа.
     * Когда статус заказа примет значение CANCELLED, места, входящие в заказ, станут свободными.
     *
     * Авторизация обязательна.
     *
     * @param int $orderId id заказа
     *
     * @return \bil24api\responses\CancelOrder|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function cancelOrder($orderId)
    {
        return $this->exec(CancelOrder::create($this->configuration, [
            'orderId' => $orderId,
        ]), \bil24api\responses\CancelOrder::class);
    }

    /**
     * Оплата ранее созданного заказа.
     * Оплатить можно только заказ со статусом NEW.
     * В результате запроса заказ примет статус PROCESSING или PAID.
     * При попытке оплатить заказ не со статусом NEW, ошибки не произойдет,
     * статус заказа не изменится, а в ответе придет актуальный статус заказа.
     *
     * Авторизация обязательна.
     *
     * @param int $orderId id заказа
     *
     * @return \bil24api\responses\PayOrder|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function payOrder($orderId)
    {
        return $this->exec(PayOrder::create($this->configuration, [
            'orderId' => $orderId,
        ]), \bil24api\responses\PayOrder::class);
    }

    /**
     * Получение заказов пользователя.
     *
     * Авторизация обязательна.
     *
     * @return \bil24api\responses\GetOrders|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getOrders()
    {
        return $this->exec(GetOrders::create($this->configuration), \bil24api\responses\GetOrders::class);
    }

    /**
     * Получение заказов пользователя.
     *
     * Авторизация обязательна.
     *
     * @param string $fromDate дата в формате dd.MM.yyyy HH:mm:ss
     *
     * @return \bil24api\responses\GetOrdersExt|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getOrdersExt($fromDate)
    {
        return $this->exec(GetOrdersExt::create($this->configuration, [
            'fromDate' => $fromDate,
        ]), \bil24api\responses\GetOrdersExt::class);
    }

    /**
     * Получение списка сеансов, по которым были куплены билеты.
     *
     * Авторизация обязательна.
     *
     * @return \bil24api\responses\GetActionEventsGroupedByTickets|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getActionEventsGroupedByTickets()
    {
        return $this->exec(GetActionEventsGroupedByTickets::create($this->configuration),
            \bil24api\responses\GetOrdersExt::class);
    }

    /**
     * Получение купленных билетов по id представления.
     *
     * Авторизация обязательна.
     *
     * @param int    $actionEventId id сеанса
     * @param int    $sizeQrCode    размер Qr кода (задается одна сторона, картинка будет квадратная)
     * @param int    $widthBarCode  ширина Bar кода
     * @param int    $heightBarCode высота Bar кода
     * @param string $type          тип изображения. PNG, JPG
     *
     * @return \bil24api\responses\GetTicketsByActionEvent|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getTicketsByActionEvent($actionEventId, $sizeQrCode, $widthBarCode, $heightBarCode, $type)
    {
        return $this->exec(GetTicketsByActionEvent::create($this->configuration, [
            'actionEventId' => $actionEventId,
            'sizeQrCode' => $sizeQrCode,
            'widthBarCode' => $widthBarCode,
            'heightBarCode' => $heightBarCode,
            'type' => $type,
        ]), \bil24api\responses\GetTicketsByActionEvent::class);
    }

    /**
     * Получение купленных билетов по id представления.
     *
     * Авторизация обязательна.
     *
     * @param int    $orderId       id заказа
     * @param int    $sizeQrCode    размер Qr кода (задается одна сторона, картинка будет квадратная)
     * @param int    $widthBarCode  ширина Bar кода
     * @param int    $heightBarCode высота Bar кода
     * @param string $type          тип изображения. PNG, JPG
     *
     * @return \bil24api\responses\GetTicketsByOrder|object
     *
     * @throws Bil24Exception
     * @throws \JsonMapper_Exception
     */
    public function getTicketsByOrder(
        $orderId,
        $sizeQrCode = null,
        $widthBarCode = null,
        $heightBarCode = null,
        $type = null
    ) {
        return $this->exec(GetTicketsByOrder::create($this->configuration, [
            'orderId' => $orderId,
            'sizeQrCode' => $sizeQrCode,
            'widthBarCode' => $widthBarCode,
            'heightBarCode' => $heightBarCode,
            'type' => $type,
        ]), \bil24api\responses\GetTicketsByOrder::class);
    }
}

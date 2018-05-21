<?php

namespace bil24api\data;

use bil24api\BaseObject;

class Action extends BaseObject
{
    /**
     * id представления.
     *
     * @var int
     */
    public $actionId;

    /**
     * краткое наименование представления.
     *
     * @var string
     */
    public $actionName;

    /**
     * полное наименование представления.
     *
     * @var string
     */
    public $fullActionName;

    /**
     * продолжительность представления в минутах.
     *
     * @var int
     */
    public $duration;

    /**
     * описание.
     *
     * @var string
     */
    public $description;

    /**
     * id вида.
     *
     * @var int
     */
    public $kindId;

    /**
     * наименование вида.
     *
     * @var string
     */
    public $kindName;

    /**
     * название постера.
     *
     * @var string
     */
    public $posterName;

    /**
     * url постера (320 х 335).
     *
     * @var string
     */
    public $smallPosterUrl;

    /**
     * url постера (640 х 670).
     *
     * @var string
     */
    public $bigPosterUrl;

    /**
     * url буклета представления.
     *
     * @var string
     */
    public $bookletUrl;

    /**
     * минимальная стоимость сеанса.
     *
     * @var float
     */
    public $minSum;

    /**
     * первая дата сеанса.
     *
     * @var string
     */
    public $firstEventDate;

    /**
     * последняя дата сеанса.
     *
     * @var string
     */
    public $lastEventDate;

    /**
     * рейтинг от 0 до 10.
     *
     * @var int
     */
    public $rating;

    /**
     * true-у представления есть КДП.
     *
     * КДП (код доступа к представлению - временное решение).
     * Перед открытием схемы зала или нажатием кнопки забронировать (в схеме зала без размещения)
     * пользователь должен ввести КДП (метод для проверки КДП - CHECK_KDP)
     *
     * @var boolean
     */
    public $kdp;

    /**
     * id города, переданный в запросе.
     *
     * @var int
     */
    public $cityId;

    /**
     * наименование города.
     *
     * @var string
     */
    public $cityName;

    /**
     * id организатора.
     *
     * @var int
     */
    public $organizerId;

    /**
     * название организатора.
     *
     * @var string
     */
    public $organizerName;

    /**
     * название устроителя.
     *
     * @var string
     */
    public $legalOwner;

    /**
     * формат HH:mm.
     * Поле присутствует, если сеанс идет в одно и тоже время.
     *
     * @var string
     */
    public $actionEventTime;

    /**
     * возрастное ограничение.
     *
     * @var string
     */
    public $age;

    /**
     * список мест проведений. key - venueId, value - venueName.
     *
     * @var array
     */
    public $venueMap = [];

    public function setVenueMap($data)
    {
        $this->venueMap = get_object_vars($data);
    }

    /**
     * список мест проведений.
     *
     * @var \bil24api\data\Venue[]
     */
    public $venueList = [];

    /**
     * список сеансов.
     *
     * @var \bil24api\data\ActionEvent[]
     */
    public $actionEventList = [];
}
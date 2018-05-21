<?php

namespace bil24api;

abstract class BaseRequestObject extends BaseObject
{
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
     * @var string
     */
    public $command;

    public static function getCommand()
    {
        return null;
    }

    /**
     * @param Configuration $configuration
     * @param array         $additionalData
     *
     * @return static
     */
    public static function create($configuration, $additionalData = [])
    {
        $object = new static();
        $object->command = static::getCommand();
        $object->loadFromArray(array_merge($configuration->toArray(), $additionalData));

        return $object;
    }

    public function getRequiredAttributes()
    {
        return ['versionCode', 'fid', 'token', 'command'];
    }

    /**
     * @throws Bil24Exception
     */
    public function check()
    {
        foreach ($this->getRequiredAttributes() as $attribute) {
            if (empty($this->$attribute)) {
                throw new Bil24Exception("$attribute not set", Bil24Exception::UNKNOWN_ERROR);
            }
        }
    }

    public function toArray($ignoreProperties = [], $excludeMode = true)
    {
        $ret = [];
        $attributes = get_object_vars($this);
        $required = $this->getRequiredAttributes();
        foreach ($attributes as $attribute => $value) {
            if ($value === null && !in_array($attribute, $required)) {
                continue;
            }
            $ret[$attribute] = $value;
        }

        return $ret;
    }
}
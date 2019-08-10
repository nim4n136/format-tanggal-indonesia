<?php

namespace Nim4n;

use Carbon\Carbon;

/**
 * Simple date formater.
 */
class SimpleDate extends Carbon
{
    use FormatList;

    protected static $locale = 'id_ID';

    protected static $timeZone = 'Asia/Jakarta';

    protected $dateTime;

    protected $display;

    protected $format;

    public static function __callStatic($method, $parameters)
    {
        if (!array_key_exists($method, self::$formatList)) {
            throw new Exception("Format name {$method} not found!");

            return;
        }
        if (!isset($parameters[0])) {
            $time = null;
        } else {
            $time = $parameters[0];
        }

        return (new self())->storeTime($time, $method);
    }

    public static function createFormat(string $customFormat, string $time = null)
    {
        parent::setLocale(self::$locale);
        $instance = new self();
        $instance->dateTime = new parent($time, self::$timeZone);
        $instance->storeFormat($customFormat);

        return $instance;
    }

    public static function addFormat(array $newFormat): void
    {
        self::$formatList = array_merge(self::$formatList, $newFormat);
    }

    protected function storeTime($time, string $nameFormat)
    {
        if (!array_key_exists($nameFormat, self::$formatList)) {
            throw new Exception("Format name {$nameFormat} not found!");

            return;
        }
        parent::setLocale(self::$locale);
        $this->dateTime = new parent($time, self::$timeZone);
        $this->storeFormat(self::$formatList[$nameFormat]);

        return $this;
    }

    protected function storeFormat(string $format)
    {
        $this->format = $format;
        $this->display = $this->dateTime->isoFormat($this->format);

        return $this;
    }

    public function __toString()
    {
        return $this->display;
    }

    public static function changeTimeZone(string $timeZone)
    {
        self::$timeZone = $timeZone;
    }

    public static function getAgo(string $time = null)
    {
        parent::setLocale(self::$locale);
        $instance = new self();
        $instance->display = (new parent($time, self::$timeZone))->diffForHumans();

        return $instance;
    }
}

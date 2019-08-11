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

    protected $optionsTimeAgo;

    protected $format;

    public static function __callStatic($method, $parameters) : self
    {
        if (!array_key_exists($method, self::$formatList)) {
            throw new \Exception("Format name {$method} not found!");
            return false;
        }
        if (!isset($parameters[0])) {
            $time = null;
        } else {
            $time = $parameters[0];
        }

        return (new self())->storeTime($time, $method);
    }

    public static function createFormat(string $customFormat, string $time = null): self
    {
        parent::setLocale(self::$locale);
        $instance = new self($time, self::$timeZone);
        $instance->format = $customFormat;
        return $instance;
    }

    public static function addGlobalFormat(array $newFormat): void
    {
        foreach($newFormat as $name => $format){
            if(array_key_exists($name, self::$formatList) || \method_exists(self::class, $name)){
                throw new \Exception("Error! Name format {$name} is exists");
                return;
            }
        }
        self::$formatList = array_merge(self::$formatList, $newFormat);
    }

    protected function storeTime($time, string $nameFormat): self
    {
        if (!array_key_exists($nameFormat, self::$formatList)) {
            throw new \Exception("Format name {$nameFormat} not found!");
            return false;
        }
        parent::setLocale(self::$locale);
        $this->__construct($time, self::$timeZone);
        $this->format = self::$formatList[$nameFormat];
        return $this;
    }


    public function __toString(): string
    {
        if($this->optionsTimeAgo){
            return $this->diffForHumans($this->optionsTimeAgo);
        }
        if ($this->format) {
            return $this->isoFormat($this->format);
        }
        return parent::__toString();
    }

    public static function changeTimeZone(string $timeZone): void
    {
        self::$timeZone = $timeZone;
    }

    public static function timeAgo(string $time = null, $options = ['options' => Carbon::NO_ZERO_DIFF]): self
    {
        parent::setLocale(self::$locale);
        $instance = (new self($time, self::$timeZone));
        $instance->optionsTimeAgo = $options;
        return $instance;
    }
}

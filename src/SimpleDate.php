<?php
namespace Nim4n;

use Carbon\Carbon;
/**
 * Simple date formater
 */

class SimpleDate extends Carbon
{

    protected static $locale = "id_ID";

    protected static $timeZone = "Asia/Jakarta";

    protected $dateTime;

    protected $display;

    protected $format;

    protected static $formatList = [
        "date"  => "DD MMMM YYYY",
        "dateDash"  => "DD-MMMM-YYYY",
        "dateSlash"  => "DD/MMMM/YYYY",

        "dateTime" => "DD MMMM YYYY HH:mm",
        "dateTimeSlash" => "DD/MMMM/YYYY HH:mm",
        "dateTimeDash" => "DD-MMMM-YYYY HH:mm",

        "shortDate"  => "Do MMMM YYYY",
        "shortDateDash"  => "Do-MMMM-YYYY",
        "shortDateSlash"  => "Do/MMMM/YYYY",

        "shortDateTime" => "Do MMMM YYYY HH:mm",
        "shortDateTimeSlash" => "Do/MMMM/YYYY HH:mm",
        "shortDateTimeDash" => "Do-MMMM-YYYY HH:mm",


        "shortMonthDate" => "DD MMM YYYY",
        "shortMonthDateSlash" => "DD-MMM-YYYY",
        "shortMonthDateDash" => "DD/MMM/YYYY",

        "shortMonthDateTime" => "DD MMM YYYY HH:mm",
        "shortMonthDateTimeSlash" => "DD/MMM/YYYY HH:mm",
        "shortMonthDateTimeDash" => "DD-MMM-YYYY HH:mm",

        "dayDate" => "dddd, DD MMMM YYYY",
        "dayDateSlash" => "dddd, DD/MMMM/YYYY",
        "dayDateDash" => "dddd, DD-MMMM-YYYY",

        "dayDateTime" => "dddd, DD MMMM YYYY HH:mm",
        "dayDateTimeSlash" => "dddd, DD/MMMM/YYYY HH:mm",
        "dayDateTimeDash" => "dddd, DD-MMMM-YYYY HH:mm",

        "shortDate" => "Do MMM YYYY",
        "shortDateSlash" => "Do/MMM/YYYY",
        "shortDateDash" => "Do-MMM-YYYY",

        "shortDayDate" => "ddd, Do MMMM YYYY",
        "shortDayDateSlash" => "ddd, Do/MMMM/YYYY",
        "shortDayDateDash" => "ddd, Do-MMMM-YYYY",

        "onlyDateMonth" => "DD MMMM",
        "onlyDateMonthSlash" => "DD/MMMM",
        "onlyDateMonthDash" => "DD-MMMM",

        "onlyShortDateMonth" => "Do MMMM",
        "onlyShortDateMonthSlash" => "Do/MMMM",
        "onlyShortDateMonthDash" => "Do-MMMM",

        "onlyDateShortMonth" => "DD MMM",
        "onlyDateShortMonthSlash" => "DD/MMM",
        "onlyDateShortMonthDash" => "DD-MMM",

        "onlyYear" => "YYYY",
        "onlyShrotYear" => "YY",

        "onlyDay"   => "dddd",
        "onlyShortDay" => "ddd",
        "onlyNumDay" => "d",
        
        "onlyMonth" => "MMMM",
        "onlyShortMonth" => "MMM",
        "onlyNumMonth" => "MM",
        "onlyShortNumMonth" => "M",

        "onlyHour12" => "hh",
        "onlyShortHour12" => "h",
        
        "onlyHour24" => "HH",
        "onlyShrotHour24" => "H",

        "onlyMinute" => "mm",
        "onlyShortMinute" => "m",

        "onlySecond" => "ss",
        "onlyShortSecond" => "s"

    ];

    public static function __callStatic($method, $parameters)
    {
        if (!array_key_exists($method, self::$formatList)) {
            throw new Exception("Format name {$method} not found!");
            return;
        }
        if(!isset($parameters[0])){
            $time = null;
        }else{
            $time = $parameters[0];
        }
        return (new SimpleDate)->storeTime($time, $method);
    }

    public static function createFormat(string $customFormat, string $time = null)
    {
        parent::setLocale(self::$locale);
        $instance = new SimpleDate();
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

    public static function getAgo(string $time = null){
        parent::setLocale(self::$locale);
        $instance = new SimpleDate();
        $instance->display = (new parent($time, self::$timeZone))->diffForHumans();
        return $instance;
    }
}
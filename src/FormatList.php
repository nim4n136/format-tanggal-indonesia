<?php
namespace Nim4n;

trait FormatList
{
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

        "dayShortMonthDate" => "dddd, DD MMM YYYY",
        "dayShortMonthDateSlash" => "dddd, DD/MMM/YYYY",
        "dayShortMonthDateDash" => "dddd, DD-MMM-YYYY",

        "dayShortMonthDateTime" => "dddd, DD MMM YYYY HH:mm",
        "dayShortMonthDateTimeSlash" => "dddd, DD/MMM/YYYY HH:mm",
        "dayShortMonthDateTimeDash" => "dddd, DD-MMM-YYYY HH:mm",

        "shortDayShortMonthDate" => "ddd, DD MMM YYYY",
        "shortDayShortMonthDateSlash" => "ddd, DD/MMM/YYYY",
        "shortDayShortMonthDateDash" => "ddd, DD-MMM-YYYY",

        "shortDayShortMonthDateTime" => "ddd, DD MMM YYYY HH:mm",
        "shortDayShortMonthDateTimeSlash" => "ddd, DD/MMM/YYYY HH:mm",
        "shortDayShortMonthDateTimeDash" => "ddd, DD-MMM-YYYY HH:mm",

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
}

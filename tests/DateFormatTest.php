<?php

use PHPUnit\Framework\TestCase;
use Nim4n\SimpleDate;

final class DateFormatTest extends TestCase
{ 
    public function testDateEqual(){
        
        $dateString = "2019-02-01";
        $createFormatDate = SimpleDate::date($dateString);
        $expect = "01 Februari 2019";
        $this->assertEquals($expect, $createFormatDate);
    }
}

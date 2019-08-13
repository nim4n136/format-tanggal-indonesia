PHP Format tanggal bahasa indonesia
======
[![StyleCI](https://github.styleci.io/repos/201660628/shield?branch=master)](https://github.styleci.io/repos/201660628)
[![Build Status](https://travis-ci.org/nim4n136/format-tanggal-indonesia.svg?branch=master)](https://travis-ci.org/nim4n136/format-tanggal-indonesia)
 [![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
 


Untuk mempermudah membuat format tanggal pada php dalam bahasa indonesia, seperti menampilkan nama hari, menampilkan nama bulan, tahun, jam, dll. 
Plugin ini mengextends [Carbon](https://carbon.nesbot.com/ "Carbon") dan fungsi2  [Carbon](https://carbon.nesbot.com/ "Carbon")  bisa di gunakan di plugin ini

## Instalasi menggunakan composer
```
composer require nim4n/date-format-indonesia
```

## Penggunaan sederhana
```php
include './vendor/autoload.php';
use Nim4n\SimpleDate;

$contohFormatTanggal = "2019-08-16 23:21";

SimpleDate::date($contohFormatTanggal);  // 16 Agustus 2019
SimpleDate::dayDate($contohFormatTanggal); // Jumat, 16 Agustus 2019

// dengan menggunakan jam dan menit
SimpleDate::dateTime($contohFormatTanggal); // 16 Agustus 2019 23:21
SimpleDate::dayDateTime($contohFormatTanggal); // Jumat, 16 Agustus 2019 23:21

// dengan nama hari dan nama bulan di singkat
SimpleDate::dayShortMonthDate($contohFormatTanggal);  // Jumat, 16 Agt 2019 
SimpleDate::dayShortMonthDateTime($contohFormatTanggal); // Jumat, 16 Agt 2019 23:21
```

## Membuat custom format 
Kita bisa membuat format tanggal sendiri dengan 2 cara
- Membuat Global Format
    ```php
    // Usahakan name/keys menggunakan camelCase 
    SimpleDate::addGlobalFormat([
        "displayDay" => "[Hari] dddd [Pukul] HH:mm",
        "fullDate" => "dddd, Do/MMMM/YYYY [Pukul] HH:mm"    
    ]);

    $contohFormatTanggal = "2019-08-16 23:21";

    // lalu panggil keys sebagai method
    SimpleDate::displayDay($contohFormatTanggal); // Hari Jumat Pukul 23:21
    SimpleDate::fullDate($contohFormatTanggal); // Jumat, 16/Agustus/2019 Pukul 23:21
    
    // Menambahkan waktu atau mengurangi waktu
    SimpleDate::fullDate($contohFormatTanggal)->add(1,"days"); // Sabtu, 17/Agustus/2019 Pukul 23:21
    SimpleDate::fullDate($contohFormatTanggal)->add(-1,"days"); //  Kamis, 15/Agustus/2019 Pukul 23:21
    // Paramter add : "hours", "minutes", "seconds", "months", "years","weeks"
    ```

- Membuat format inline
    ```php
    $contohFormatTanggal = "2019-08-16 23:21";
    SimpleDate::createFormat("Do-MMMM-YYYY", $contohFormatTanggal); //  16-Agustus-2019
    ```

## Membuat Time Ago
```php
// Waktu sekarang di kurangi 1 menit
SimpleDate::timeAgo()->add(-1,"minutes"); // 1 menit yang lalu

// Tampilakan waktu yang lalu
$waktuYangLalu = "2017-01-11 23:21";
SimpleDate::timeAgo($waktuYangLalu);
```

### Tampilkan Waktu Sekarang
Kosongkan tanggal pada paramter, otomatis menggunakan waktu sekarang
Contoh:
```php
// default format tanggal
SimpleDate::date();
SimpleDate::dayDate(); 

// add format global
SimpleDate::addGlobalFormat([
    "displayDay" => "[Hari] dddd [Pukul] HH:mm",
    "fullDate" => "dddd, Do/MMMM/YYYY [Pukul] HH:mm"    
]);

// Panggil custom format global
SimpleDate::displayDay();
SimpleDate::fullDate();

// Create format inline
SimpleDate::createFormat("Do-MMMM-YYYY");


// timeAgo
SimpleDate::timeAgo();
```

## Contoh menggunakan fungsi carbon
```php
// Ambil waktu sekarang
SimpleDate::now(); 

// parse time
$timeToParse = "2017-01-11 23:21";
SimpleDate::parse($timeToParse)->format("d-m-Y H:i:s"); // Output: 11-01-2017 23:21:00
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).

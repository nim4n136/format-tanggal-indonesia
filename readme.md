PHP Format tanggal bahasa indonesia
======
[![StyleCI](https://github.styleci.io/repos/201660628/shield?branch=master)](https://github.styleci.io/repos/201660628)
[![Build Status](https://travis-ci.org/nim4n136/format-tanggal-indonesia.svg?branch=master)](https://travis-ci.org/nim4n136/format-tanggal-indonesia)
 [![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
 


Untuk mempermudah membuat format tanggal pada php dalam bahasa indonesia, seperti menampilkan nama hari, menampilkan nama bulan, tahun, jam, dll. 
Plugin ini mengextends [Carbon](https://carbon.nesbot.com/ "Carbon") dan fungsi2  [Carbon](https://carbon.nesbot.com/ "Carbon")  bisa di gunakan di plugin ini

### Instalasi menggunakan composer
```
composer require nim4n/date-format-indonesia
```
### Penggunaan

#### Contoh sederhana
```php
include './vendor/autoload.php';
use Nim4n\SimpleDate;

$contohFormatTanggal = "2019-08-16 23:21";

echo SimpleDate::date($contohFormatTanggal); 
// Output: 16 Agustus 2019
echo "\n";
echo SimpleDate::dayDate($contohFormatTanggal); 
// Output: Jumat, 16 Agustus 2019
echo "\n";

// dengan menggunakan jam dan menit
echo SimpleDate::dateTime($contohFormatTanggal); 
// Output: 16 Agustus 2019 23:21
echo "\n";
// menambahkan hari 
echo SimpleDate::dayDateTime($contohFormatTanggal); 
// Output: Jumat, 16 Agustus 2019 23:21
echo "\n";

// dengan nama hari dan nama bulan di singkat
echo SimpleDate::dayShortMonthDate($contohFormatTanggal); 
// Output: Jumat, 16 Agt 2019 
echo "\n";
// dengan nama hari dan nama bulan di singkat tambah jam waktu
echo SimpleDate::dayShortMonthDateTime($contohFormatTanggal); 
// Output: Jumat, 16 Agt 2019 23:21
echo "\n";
```

### Membuat custom format 
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
    echo SimpleDate::displayDay($contohFormatTanggal); 
    // Output: Hari Jumat Pukul 23:21
    echo "\n";
    echo SimpleDate::fullDate($contohFormatTanggal); 
    // Output: Jumat, 16/Agustus/2019 Pukul 23:21
    echo "\n";

    // Menambahkan waktu atau mengurangi waktu
    echo SimpleDate::fullDate($contohFormatTanggal)->add(1,"days"); 
    // Output: Sabtu, 17/Agustus/2019 Pukul 23:21
    echo "\n";
    echo SimpleDate::fullDate($contohFormatTanggal)->add(-1,"days"); 
    // Output: Kamis, 15/Agustus/2019 Pukul 23:21
    echo "\n";
    // Paramter add : "hours", "minutes", "seconds", "months", "years","weeks"
    ```

- Membuat format inline
    ```php
        $contohFormatTanggal = "2019-08-16 23:21";
        echo SimpleDate::createFormat("Do-MMMM-YYYY", $contohFormatTanggal); // Output: 16-Agustus-2019
    ```

### Membuat Time Ago
```php
// Waktu sekarang di kurangi 1 menit
echo SimpleDate::timeAgo()->add(-1,"minutes"); 
// Output: 1 menit yang lalu
echo "\n";

// Tampilakan waktu yang lalu
$waktuYangLalu = "2017-01-11 23:21";
echo SimpleDate::timeAgo($waktuYangLalu);
```

### Tampilkan Waktu Sekarang
Kosongkan tanggal pada paramter, otomatis menggunakan waktu sekarang
Contoh:
```php
// default format tanggal
echo SimpleDate::date();
echo "\n";
echo SimpleDate::dayDate(); 
echo "\n";

// add format global
SimpleDate::addGlobalFormat([
    "displayDay" => "[Hari] dddd [Pukul] HH:mm",
    "fullDate" => "dddd, Do/MMMM/YYYY [Pukul] HH:mm"    
]);

// Panggil custom format global
echo SimpleDate::displayDay();
echo "\n";
echo SimpleDate::fullDate();
echo "\n";

// Create format inline
echo SimpleDate::createFormat("Do-MMMM-YYYY");
echo "\n";

// timeAgo
echo SimpleDate::timeAgo();
```

### Contoh menggunakan fungsi carbon
```php
// Ambil waktu sekarang
echo SimpleDate::now(); 
echo "\n";

// parse time
$timeToParse = "2017-01-11 23:21";
echo SimpleDate::parse($timeToParse)->format("d-m-Y H:i:s"); // Output: 11-01-2017 23:21:00
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
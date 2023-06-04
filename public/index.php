<?php
/*
        --PATH_INFO--
- PATH_INFO Merupakan key yang terdapat di global variable $_SERVER
- PATH_INFO adlh informasi path yang terdapat pada URL ketika kita mengakses file.php
- Misal jika URL nya adalah http://contoh.com/index.php maka tidak ada PATH_INFO
- jika URL nya adalah http://contoh.com/index.php/test maka PATH_INFO nya adalah /test
- jika URL nya adalah http://contoh.com/index.php/products/123 maka PATH_INFO nya adalah /products/123
- Dan jika URL nya adalah http://contoh.com/index.php/category?id=123 maka PATH_INFO nya adalah /category

Untuk apa PATH_INFO?
- PATH_INFO ini banyak digunakan sebagai URL Routing
- Artinya saat membuat aplikasi PHP, kebanyakan kita biasanya membuat 1 file untuk 1 URL, misal
contoh.com/index.php, contoh.com/product.php, contoh.com/login.php
- Namun best practice dalam framework-framework MVC, biasanya kita hanya menggunakan 1 file php sebagai gerbang masuknya, dan memanfaatkan PATH_INFO sebagai informasi file apa yang harus kita load

if (isset($_SERVER['PATH_INFO'])){
    echo $_SERVER['PATH_INFO'];
} else {
    echo "TIDAK ADA PATH_INFO";
}

        --ROUTING--
- Routing adlah teknik melakukan penentuan rute dari URL ke file PHP yan akan di eksekusi
- Secara default routing sudah dilakukan oleh Web Server, misal jika kita buka /Index.php maka akan 
mengakses file index.php, jika membuat url/user/login.php, maka akan mengakses file login.php di folder user
- Namun karena sekarang kita ingin menggunakan PATH_INFO, maka kita perlu melakukan routing sendiri

        --ROUTER--
- Router yang sebelumnya sangat sederhana, hanya meneruskan PATH_INFO ke file php yang dituju,
sedangkan MVC, Router seahrusnya meneruskan PATH_INFO menuju class Controller yang dituju

        --URL Mapping--
- perlu memberi tahu Router tentang pasangan antara PATH_INFO dan Controller yang akan di eksekusi
- selain itu, perlu memberi tahu HTTP Method mana yang dibolehkan untuk mengakses PATH_INFO tersebut


# Memilih Controller dari PATH_INFO
- setelah menambahkan semua URL Mapping ke Router, maka dengan mudah kita bisa
mendapatkan Controller mana yang perlu dieksekusi ketika ada request terhadap PATH_INFO



 */

//  $path = "/index";
//  if (isset($_SERVER['PATH_INFO'])){
//     $path = $_SERVER['PATH_INFO'];
//  }

// require __DIR__ . '/../app/view' . $path . '.php';

//Menggunakan Router
require_once __DIR__ . '/../vendor/autoload.php';
use WahyuNurdian\Belajar\PHP\MVC\App\Router;

Router::add('GET', '/', 'HomeController', 'index');
Router::add('GET', '/login', 'UserController', 'login');
Router::add('GET', '/register', 'UserldController', 'register');

Router::run();
<?php
try {
    header("content-type:text/html;charset=utf-8");
    // $linkSQL = new PDO("mysql:host=127.0.0.1; dbname=108-4-16; charset=utf8", "108-4-16", "9LBNWa%9");
    $linkSQL = new PDO("mysql:host=127.0.0.1; dbname=tool; charset=utf8", "root", "123");
    // $linkSQL = new PDO("mysql:host=localhost; dbname=id12074110_tool; charset=utf8", "id12074110_admin", "6fxwKxed");
    $linkSQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();
} catch (PDOException $e) {
    echo '錯誤：' . $e->getMessage();
}

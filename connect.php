<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "nota_fiscal";

    $connection = new MySQLi("$host", "$user", "$password", "$database");

    $connection -> set_charset("utf8");
?>
<?php
// comunicacao com banco de dados utilizando o PDO.
$db_name = 'academysparta';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=academysparta;host=localhost", "root","");

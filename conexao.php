<?php
$host = "localhost";
$db   = "ponto";
$user = "root";
$pass = "secreta123";
// conecta ao banco de dados
$con = new mysqli($host, $user, $pass,$db) or trigger_error(mysql_error(),E_USER_ERROR);


?>

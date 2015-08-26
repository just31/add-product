<?php

$username = "admin";
$password = "admin";
$hostname = "localhost";
$databasename = "product";

$connecDB = mysql_connect($hostname, $username, $password) or die('could not connect to database');
mysql_select_db($databasename,$connecDB);

?>
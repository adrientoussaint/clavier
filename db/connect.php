<?php
include_once('config.php');

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'', $db_usr,$db_psw);
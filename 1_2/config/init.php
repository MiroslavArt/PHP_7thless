<?php 
	$config = require 'config/db.php';
	$conDB = mysqli_connect($config['host'], $config['user'], $config['password'], $config['db']); 
?>
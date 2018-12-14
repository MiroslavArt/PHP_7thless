<?php
  /* Принимаем данные из формы */
  $name = $_POST["name"];  
  $text_comment = $_POST["text_comment"];  
  $config1 = require '../config/db.php';
  $conDB1 = mysqli_connect($config1['host'], $config1['user'], $config1['password'], $config1['db']);     
  if (!$conDB1) {
	       die("Connection failed: " . mysqli_connect_error());
	}	  
  $sql = "INSERT INTO feedback (user_name, text) VALUES ('$name', '$text_comment')";
  if (mysqli_query($conDB1, $sql)) {	      
	} else {	     
	}
  mysqli_close($conDB1);   
?>

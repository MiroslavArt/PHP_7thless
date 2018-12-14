<?php
	$login = $_POST["login"]; 	
	$pwd = md5($_POST['pwd']);
	//$pwd = md5(md5(trim($_POST['pwd'])));; 	
	require('config/init.php');		
	$query9 = "SELECT * FROM users WHERE userlogin='$login'";
	$query10 = "INSERT INTO users (userlogin, userpwd) VALUES ('$login', '$pwd')";	
	$resDB6 = mysqli_query($conDB, $query9);
	$data5 = mysqli_fetch_all($resDB6, MYSQLI_ASSOC);
	if (count($data5) > 0) {
    	foreach ($data5 as $row) {			
			mysqli_close($conDB);  
			header("Location: registerform.php"); 
		}
 	} else {
 		//echo "Добавление записи"; 		
		if (mysqli_query($conDB, $query10)) {			
			mysqli_close($conDB); 
			header("Location: index.php"); 
		}			
 	}	 	
?>


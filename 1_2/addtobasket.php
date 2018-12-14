<?php
session_start();
$talon = session_id();
$data = date('y/n/d');
$idtovara = $_GET['idtovara'];
$qty = $_POST["qty"]; 
$user = "admin"; 
require('config/init.php');
$query4 = "INSERT INTO basket (talon, idgood, qty, data, user) VALUES ('$talon', '$idtovara', '$qty', '$data', '$user')";
$query5 = "SELECT * FROM basket WHERE idgood='$idtovara' AND talon='$talon'";
$resDB4 = mysqli_query($conDB, $query5);
$data4 = mysqli_fetch_all($resDB4, MYSQLI_ASSOC);
if (count($data4) > 0) {
    foreach ($data4 as $row) {
    	$curQTY = $row['qty'] + $qty;
    	$query6 = "UPDATE basket SET qty = '$curQTY' WHERE idgood='$idtovara' AND talon='$talon'";
    	if (mysqli_query($conDB, $query6)) {    		
    		echo "Запись в корзине обновлена";
    	}
 	}
} else {	     
	if (mysqli_query($conDB, $query4)) {    		
    		echo "Запись в корзину добавлена";
    	}
} 	
mysqli_close($conDB);   
?>
<script type="text/javascript">     
    function back() {
  		document.location.href = 'catalogue.php';    	
	}
	setTimeout(back, 3000);    
</script>
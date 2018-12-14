<?php
session_start();
$talon = session_id();
if ($_SERVER['REQUEST_METHOD'] == "POST") {	
    $itemid = $_POST['itemid'];
    echo $itemid;
    echo $talon;
    $config2 = require 'config/db.php';
    $conDB2 = mysqli_connect($config2['host'], $config2['user'], $config2['password'], $config2['db']);    
    $query9 = "DELETE FROM basket WHERE idgood='$itemid' AND talon='$talon'";
    if (mysqli_query($conDB2, $query9)) {
    	echo "Запись удалена";
    } else {
    	echo "Запись не удалена";    	
    }   
    mysqli_close($conDB2);    
}
?>
<!DOCTYPE html>
<html lang="ru">
<?php
require('config/init.php');
if (!mysqli_set_charset($conDB, "utf8")) {
	//printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($conDB2));
	exit();
} else {
	//printf("Текущий набор символов: %s\n", mysqli_character_set_name($conDB2));
}
//echo "сессия";
//echo $talon;
//$query7 = "SELECT * FROM basket WHERE talon='$talon' JOIN directory ON directory.id = basket.idgood";
$query7 = "SELECT * FROM basket WHERE talon='$talon'";
$resDB5 = mysqli_query($conDB, $query7);
$data3 = mysqli_fetch_all($resDB5, MYSQLI_ASSOC);
if (count($data3) > 0) {				
    foreach ($data3 as $row) { 
    	$goodid = $row['idgood']; 
    	$qty = $row['qty'];  
    	$query8 = "SELECT * FROM directory WHERE id='$goodid'";
    	$resDB6 = mysqli_query($conDB, $query8);
    	$data4 = mysqli_fetch_all($resDB6, MYSQLI_ASSOC);
    	if (count($data4) > 0) {
    		foreach ($data4 as $row2) {
    			$title = $row2['title'];
    		}
    	}            			
        echo '<div><span>'.$title.'</span>.</div><div><span>Количество в корзине:<span>'.$qty.'</span></div>
        	<div><form action="" method="POST"><input type="hidden" name="itemid" value="'.$goodid.'"><input type="submit" value="Удалить из корзины")"></form></div>';           			     			
            }
        }
mysqli_close($conDB); 
?>
</html>
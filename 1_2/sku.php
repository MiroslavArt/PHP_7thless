<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">    
    <link href="styles/media.css" rel="stylesheet">
    <title>Карточка товара</title>
</head>
<body>
<header>
	<div class="container">
		<div class="header">
		</div>
		<div class="menu">
			<span><a href="index.php">Главная</a></span>
			<span><a href="catalogue.php">Каталог</a></span>
			<span><a href="corzina.php">Моя корзина</a></span>		
		</div>		 
	</div>
</header>
	<div class="sku">
		<?php 
			$id = $_GET['id'];			
			require('config/init.php');			
        	if (!mysqli_set_charset($conDB, "utf8")) {				    
				    exit();
				} else {				    
				} 
        	$query3 = "SELECT * FROM directory WHERE id=$id";
    		$resDB3 = mysqli_query($conDB, $query3);
    		$data3 = mysqli_fetch_all($resDB3, MYSQLI_ASSOC);
    			if (count($data3) > 0) {				
        			foreach ($data3 as $row) {
            			$fileOriginal1 = $row['path'] . $row['file_name1'];  
            			$title = $row['title'];                			
            			$descr = $row['description'];               		
            			echo '<div class="skus"><img class="Image" src="'.$fileOriginal1.'" alt="book"  title="'.$title.'"/></div>';
            			echo '<div><span>"'.$descr.'"</span></div>';       			
            		}
            	}
            mysqli_close($conDB);  
		?>
		<form action="addtobasket.php?idtovara=<?php echo $id; ?>" method="POST">
			<label>Количество:</label><input type="text" name="qty" />
			<input type="submit" value="В корзину" onClick="alert('Товар добавлен в корзину!')">
		</form>	
	</div>
<footer>
	<div class="footer"> 	
		<div class="social">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>			
		</div>	
		<div class="footer_text"><span>Все права защищены <sup>&copy;</sup></span></div>
	</div>
</footer>
</body>
</html>
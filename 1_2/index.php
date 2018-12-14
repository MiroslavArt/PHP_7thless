<?php 
	require('config/init.php');
	if (isset($_COOKIE['name']) and isset($_COOKIE['hash'])) {
		$name = "Мирослав Лянцевич"; 
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
    <script src="scripts/site.js"></script>
    <title>Онлайн магазин</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="header">
			</div>
			<!--сделано выравнивание по флекс технологии 15.02.2018 -->
			<!--убрана горизонтальная прокрутка 16.02.2018 -->
			<ul class="menu">
			<!--домашнее задание третьего урока -->
			<?php
				$menu = [
					'main' => '<li>Главная</li>',
					'Login' => '<li><a href="login.php">Войти</a></li>',  
					'Reg' => '<li><a href="registerform.php">Регистрация</a></li>', 
					'Catalogue' => '<li><a href="catalogue.php">Каталог</a></li>',   
					'Contacts' => '<li><a href="corzina.php">Моя корзина</a></li>' 
				];
				foreach($menu as $key => $item)
				{
					echo "$item";				
				}	
			?>
			</ul>		 
		</div>
	</header>
		<div class="center">
			<h1>Интернет-магазин по продаже книг</h1>
			<p>Добро пожаловать <?php echo $name; ?> в наш Интернет-магазин, где вы найдете широкий выбор книг!</p>
			<?php
				// ДЗ к уроку 4
				/*define("IMAGES_DIR", "images/mainpage/");
				function scanDirectory()
    			{
        		$dir = opendir(IMAGES_DIR);
       			 while ($filename = readdir($dir)) {
            		if (!is_dir($filename)) {
                		$fileType = explode("/", mime_content_type(IMAGES_DIR . $filename))[0];
                		if ($fileType == "image") {
                    		$files[] = $filename;
                			}

            			}
        			}
			        closedir($dir);
			        return $files;
    			}
    			$pics = scanDirectory();
		        if(count($pics) > 0) {
            	foreach ($pics as $picName) {
                $picNameFull = IMAGES_DIR . $picName;         
                echo '<a href="' . $picNameFull . '" target="_blank">';
                echo '<img class="imagesize" src="' . $picNameFull . '"/></a>';
            	}
        		} else {
            		echo '<div><h4>Каталог пуст</h4></div>';
        		}*/
        		// ДЗ к уроку 5        		
        		//$config = require 'config/db.php';
        		// $conDB = mysqli_connect("localhost:3306", "root", "123456", "books");    
        		//$conDB = mysqli_connect($config['host'], $config['user'], $config['password'], $config['db']); 
        		$query = "SELECT * FROM pictures";
    			$resDB = mysqli_query($conDB, $query);
    			$data = mysqli_fetch_all($resDB, MYSQLI_ASSOC);
    			if (count($data) > 0) {
        			foreach ($data as $row) {
            			$fileOriginal = $row['path'] . $row['name'];            			
            			echo '<a href="' . $fileOriginal . '" target="_blank">';
                		echo '<img class="imagesize" src="' . $fileOriginal . '"/></a>';            			
            		}
            	}
            	//mysqli_close($conDB);   
			?>			
		</div>	
		<div class="otzv">Отзывы:</div>
		<?php
			$query2 = "SELECT * FROM feedback";
			//$conDB2 = mysqli_connect($config['host'], $config['user'], $config['password'], $config['db']); 
			$resDB2 = mysqli_query($conDB, $query2);
    		$data2 = mysqli_fetch_all($resDB2, MYSQLI_ASSOC);
    		if (count($data2) > 0) {
        			foreach ($data2 as $row2) { 
        				echo '<div>' . $row2['user_name'] . $row2['text'] . '</div>';           			         			
            			//echo $row2['user_name'];
                		//echo $row2['text'];            			
            		}
            	}            	
		?>
		<div><span>Оставить отзыв о магазине</span>			
			<form name="comment" id="form"> 		
  			<p>
    			<label>Имя:</label>
    			<input type="text" name="name" />
  			</p>
  			<p>
    			<label>Комментарий:</label>
    			<br />
    			<textarea name="text_comment" cols="28" rows="8"></textarea>
  				</p>
  				<p>
    			<!-- <input type="hidden" name="page_id" value="150" /> -->
    			<input type="submit" value="Отправить"/>
  				</p>
			</form> 
		</div>	
	<footer>
	<div class="footer"> 	
			<!--добавлены пиктограммы соцсетей 15.02.2018 -->
			<!--пиктограмма по всему сайту прижата к низу окна браузера 16.02.2018 -->
			<div class="social">
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>			
			</div>	
			<div class="footer_text"><span>Все права защищены</span>
			<!--домашнее задание второго урока -->
			<?php
			// mysqli_close($conDB); 
			$current_year = date ( 'Y' );
			echo "© SiteName.ru 2017-".$current_year; 
			?>
			</div>
		</div>		
</footer>
</body>
</html>
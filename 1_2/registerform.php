<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
    <script src="scripts/site.js"></script>
    <title>Форма регистрации</title>
</head>
<body>
<form action="register.php" method="POST"> 		
  	<p>
    	<label>Логин:</label>
    	<input type="text" name="login" />
    	<label>Пароль:</label>
    	<input type="text" name="pwd" />
   </p>
   <p>    	
    	<input type="submit" value="Зарегистрироваться"/>
   </p>
</form> 
</body>
</html>
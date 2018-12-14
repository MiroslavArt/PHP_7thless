<?
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }
    return $code;
}
if(isset($_POST['submit']))
{    
    require('config/init.php'); 
    $login = $_POST["login"];     
    $pwd = md5($_POST['pwd']);
    //echo $login;
    //echo $pwd;
    //echo $pwd;  
    $query11 = "SELECT * FROM users WHERE userlogin='$login'";
    $resDB7 = mysqli_query($conDB, $query11);
    $data6 = mysqli_fetch_all($resDB7, MYSQLI_ASSOC);
    if (count($data6) > 0) {
        foreach ($data6 as $row) {
            //echo $row['userpwd'];
            if($row['userpwd'] == $pwd) {
                $hash = md5(generateCode(10));
                //echo $hash; 
                $query12 = "UPDATE users SET userhash = '$hash' WHERE userlogin='$login'"; 
                //print "Вы ввели правильный пароль"; 
                if (mysqli_query($conDB, $query12)) {                     
                    setcookie("name", $row['userlogin'], time()+60*60*24*30);
                    setcookie("hash", $hash, time()+60*60*24*30);    
                    header("Location: index.php");                
                }                
                
            } else {    
                print "Вы ввели неправильный пароль";    
            }  
            mysqli_close($conDB);              
        }     
    } else {    
        print "Пользователь с таким логином не заргистрирован в базе";  
    }
}    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
    <script src="scripts/site.js"></script>
    <title>Форма ввода логина и пароля</title>
</head>
<body>
<form method="POST">
Логин <input name="login" type="text"><br>
Пароль <input name="pwd" type="password"><br>
<input name="submit" type="submit" value="Войти">
</form>
</body>
</html>
<?php 
// Скрипт проверки
  require_once('connect.php');
  // Соединямся с БД
$dbh=$con;

if (isset($_COOKIE['login']) and isset($_COOKIE['email']))
{
    $email = $_COOKIE['email'];
    $login = $_COOKIE['login'];
    
    $sth = $dbh->prepare("SELECT * FROM `user` WHERE `Login` = :login");
    $sth->execute(array('login' => $login));
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($result != false)
    {
    if(($result['Login'] !== $login) or ($result['Email']  !== $email))
    {
        setcookie("login", "", time() - 3600*24*30*12, "/");
        setcookie("email", "", time() - 3600*24*30*12, "/", null, null, true); 
        //print "Хм, что-то не получилось";
        echo "<script type=\"text/javascript\"> function show_alert() { alert(\"Что-то не получилось!\"); } </script>"; 
    }
    else
    {
       // print "Привет, ".$result[0]['Login'].". Всё работает!";
       echo "<script type=\"text/javascript\"> function show_alert() { alert(\"Авторизация пройдена!\"); } </script>"; 
       // Переадресовываем браузер на страницу адмнистративной панели
       header("Location: workdb.php"); exit();
    }
    }
}
else
{
    //print "Включите куки";
    echo "<script type=\"text/javascript\"> function show_alert() { alert(\"Включите куки!\"); } </script>"; 
}
  // Переадресовываем браузер на страницу об пользователе
  header("Location: purchases.php"); exit();
?>
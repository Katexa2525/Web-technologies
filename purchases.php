<?php
require_once('class.view.php');
require_once('connect.php');

$view = new View('/tpl/');
$view->set('title', 'PURCHASES');
$view->set('contentHome', 'Home');
$view->set('contentAbout', 'About');
$view->set('contentPurchases', 'Purchases');
$view->set('contentDELIVERY', 'DELIVERY OR RECIPIES');
$view->set('contentFill', 'Fill the form');
$view->set('contentFormName', 'Name');
$view->set('contentEmail', 'Email');
$view->set('contentCssStylePu', 'css/purchases.css');
$view->set('contentCssStyle', 'css/style.css');

$view->set('contentFruit', 'Fruit');
$view->set('contentMeat', 'Meat');
$view->set('contentVegetables', 'Vegetables');

$view->set('contentImgFruit', 'images/grid_fruits.jpg');
$view->set('contentImgMeat', 'images/grid_meat.jpg');
$view->set('contentImgVegetables', 'images/grid_vegetables.jpg');

$view->set('regexpStatus', '');
if (!empty($_POST)) {
    $email = $_POST['mail'];
    $login = $_POST['login'];
    $regex = '/\A[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}\z/';
    if (preg_match($regex, $email)) {
        /*try {

            $dbh = $con;
            $sth = $dbh->prepare("SELECT * FROM `user` WHERE `Login` = :login AND `Email` = :email");
            $sth->execute(array('login' => $login,'email' => $email));
            $result = $sth->fetch(PDO::FETCH_ASSOC);

            if (count($result)>0)
            {
                // Ставим куки
                setcookie("login", $result[0]['Login'], time()+60*60*24*30, "/");
                setcookie("email", $email, time()+60*60*24*30, "/", null, null, true);

                // Переадресовываем браузер на страницу проверки нашего скрипта
                header("Location: check.php"); exit();
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }*/
        $view->set('regexpStatus', 'Valid');
    } else {
        $view->set('regexpStatus', 'Invalid');
    }
}

$view->display('purchases.tpl');
?>
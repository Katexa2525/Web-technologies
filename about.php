<?php
require_once('class.view.php');
require_once('connect.php');
$gl_dbh = null;
$gl_user = null;
$gl_aboutUser = null;

$view = new View('/tpl/');
$view->set('title', 'ABOUT');
$view->set('contentHome', 'Home');
$view->set('contentAbout', 'About');
$view->set('contentPurchases', 'Purchases');
$view->set('contentABOUT_AUTHOR', 'ABOUT');
//$view->set('contentButton', 'Like');
/*<p class="about">
        <?php echo $this->contentABOUT_TXT?>
	
		<div class="Me">
			<div><img src=<?php echo $this->contentImgMe?>></div>
		 </div>
		<div class="Bonya">
			<div><img src=<?php echo $this->contentImgBonya?>>
		</div>
        <div class="gradient-button"><?php echo $this->contentButton?></div>
	</p>*/
//$view->set('contentImgMe', 'images/me.jpg');
//$view->set('contentImgBonya', 'images/Bonya.jpg');
$view->set('contentCssStyle', 'css/style.css');
$view->set('contentCssAbout', 'css/about_style.css');

try {
    if(isset($_POST['login']) && isset($_POST['mail']))
    {
            $gl_dbh = $con;
            $sth = $gl_dbh->prepare("SELECT * FROM `user` WHERE `Login` = :login AND `Email` = :email");
            $sth->execute(array('login' => $_POST['login'],'email' => $_POST['mail']));
            $result = $sth->fetch(PDO::FETCH_ASSOC);

            if ($result != false)
            {
                $sth = $gl_dbh->prepare("SELECT * FROM `aboutuser` WHERE `UserId` = :userId");
                $sth->execute(array('userId' => $result['Id']));
                $GLOBALS["gl_aboutUser"] = $sth->fetch(PDO::FETCH_ASSOC);
                //print  $result[0]['Login'];

            }
            // Ставим куки
            setcookie("login", $result['Login'], time()+60*60*24*30, "/");
            setcookie("email", $result['Email'], time()+60*60*24*30, "/", null, null, true);
            // Переадресовываем браузер на страницу проверки нашего скрипта
            header("Location: check.php"); exit();
    }
    else if(isset($_POST['back']))
    {
        $gl_dbh = $con;
        $sth = $gl_dbh->prepare("SELECT * FROM `user` WHERE `Login` = :login AND `Email` = :email");
        $sth->execute(array('login' => $_COOKIE['login'],'email' => $_COOKIE['email']));
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if ($result != false)
        {
            $sth = $gl_dbh->prepare("SELECT * FROM `aboutuser` WHERE `UserId` = :userId");
            $sth->execute(array('userId' => $result['Id']));
            $GLOBALS["gl_aboutUser"] = $sth->fetch(PDO::FETCH_ASSOC);
        }
    }
    if($GLOBALS["gl_aboutUser"]!=null)
        $about_text  = $GLOBALS["gl_aboutUser"]["About"];
    else $about_text = "";
   } catch (PDOException $e) {
        
     die($e->getMessage());
        
    }

//'She was an ordinary girl. But one day she wanted to become a gachi jock. that is how she came to it. Why? You ask. 
//Let God know. She has a dog. She loves to make jewelry and draw. Listening to music is second only to sleeping. 
//I do not know what else to write here. I hope that is enough.
//Kate Penisova.';
$view->set('contentABOUT_TXT', $about_text);

$view->display('about.tpl');
?>
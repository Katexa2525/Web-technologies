<?php 
  require_once 'connect.php';
  $conn = $con;
  $cooklog = '';

  if (isset($_COOKIE['login']))
  {
    $cooklog = $_COOKIE['login'];
  }

  if (isset($_POST['delete']) && isset($_POST['id']))
  {
    $id = $_POST['id']; 
    $query = "DELETE FROM `user` WHERE `Id`=:id";
    $result = $conn->prepare($query);
    $result->execute(array('id' => $id));
    if(!$result) echo "Сбой при удалении данных<br><br>";
  }
  if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['description']))
  {
     $login = $_POST['login'];
     $email = $_POST['email'];
     $description = $_POST['description'];
     $query = "INSERT INTO `user` SET `Login`=:login, `Email`=:email, `Description`=:description";
     $result = $conn->prepare($query);
     $result->execute(array('login' => $login, 'email' => $email, 'description' => $description));
     if(!$result) echo "Сбой при вставке данных<br><br>";
  }

  echo <<<_END
  <pre>
  User $cooklog
  <form action='about.php' method='post'>
  <input type='hidden' name='back' value='yes'>
  <input type="submit" value="BACK">
  </form>
  </pre>
  <form action="workdb.php" method="post">
    <pre>
        Login<input type="text" name="login">
        Email<input type="text" name="email">
        Description<input type="text" name="description">
        <input type="submit" value="ADD RECORD">
    </pre>
  _END;

   $query = "SELECT * FROM `user`";
   $result = $conn->prepare($query);
   $result->execute();
   $rows = $result->fetchAll(PDO::FETCH_ASSOC);
   if(!$result) die ("Сбой при доступе к базе данных");

   $members = count($rows);

   for($j=0; $j<$members;++$j)
   {
    //$row = $result-> fetch_arrow(MYSQLI_NUM);
    $r = htmlspecialchars($rows[$j]['Id']);
    $r0 = htmlspecialchars($rows[$j]['Login']);
    $r1 = htmlspecialchars($rows[$j]['Email']);
    $r2 = htmlspecialchars($rows[$j]['Description']);

    echo <<<_END
    <pre>
      Id $r
      Login $r0
      Email $r1
      Description $r2
    </pre>
    <form action='workdb.php' method='post'>
    <input type='hidden' name='delete' value='yes'>
    <input type='hidden' name='id' value='$r'>
    <input type='submit' value='DELETE RECORD'></form>
    _END;
   }
?>
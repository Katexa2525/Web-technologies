<?php
  try{
    $con=new PDO('mysql:dbname=fooddb;host=localhost', 'root', '');
  }
  catch (PDOException $e) {
    die($e->getMessage());
  }
?>
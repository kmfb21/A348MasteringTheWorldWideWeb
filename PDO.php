<?php
try
{
  $pdo = new PDO('mysql:host=silo.soic.indiana.edu;port=51515;dbname=pacers', 'bo', 'whatev3r');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');

  echo "I am in!";

}
catch (PDOException $e)
{
  $output = 'Unable to connect to the database server.';
  include 'output.html.php';
  exit();
}
 ?>

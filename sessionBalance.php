<?
  session_start(); 

  $balance = $_SESSION["balance"]; 
  $total = $_SESSION["total"];  

  $answer  = $_REQUEST["answer"];  
  $action  = $_REQUEST["action"];  

  if ($action == "Up") {
    $balance += $answer; 
    $total += 1; 
  } else if ($action == "Down") {
    $balance -= $answer; 
    $total += 1; 
  } else {
  $balance = 0;
  $total = 0;
  $answer = 0;
}

  $_SESSION["balance"   ] = $balance;
  $_SESSION["total"  ] = $total; 

 ?>
<form>
  <p> 
  Now you have clicked the button <?=$total?> times. Balance is <?=$balance?> 
  <p> Enter here the amount: <input type=text name=answer size=8>
  <p> <input type=submit name=action value=Up> <input type=submit name=action value=Down>
  <p> <input type=submit name=action value=Reset>
</form>

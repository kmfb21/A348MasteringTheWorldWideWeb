<?
  session_start(); 

  $message = $_SESSION["message"]; 
  $n1      = $_SESSION["n1"]; 
  $n2      = $_SESSION["n2"]; 
  $good    = $_SESSION["good"]; 
  $total   = $_SESSION["total"];  

  $answer  = $_REQUEST["answer"];  
  $action  = $_REQUEST["action"];  


    if ($message && $action != "Reset") {

      if ($answer == $n1 + $n2) {
        $good += 1; 
        $message = "Very good $n1 + $n2 = ". ($n1 + $n2) . ". "; 
      } else {
        $message = "Nope, $n1 + $n2 is " . ($n1 + $n2) . ", not $answer. "; 
      } 
      $total += 1; 
      $message .= "Score is now: $good out of $total "; 
      $n1 = rand(-50, 50); 
      $n2 = rand(-50, 50); 
    } else {
      $message = "Welcome to the addition quiz."; 
      $good = 0; 
      $total = 0; 
      $n1 = rand(-50, 50); 
      $n2 = rand(-50, 50); 

    } 

  $_SESSION["message"] = $message;
  $_SESSION["n1"     ] = $n1;
  $_SESSION["n2"     ] = $n2;
  $_SESSION["good"   ] = $good;
  $_SESSION["total"  ] = $total; 

 ?>
<form>
  <?=$message?> <p> 
  What is <?=$n1?> + <?=$n2?> ? Answer: <input type=text name=answer size=4> <p> 
  Press <input type=submit name=action value=Proceed> to send your answer or <input type=submit name=action value=Reset> to restart.  
</form>

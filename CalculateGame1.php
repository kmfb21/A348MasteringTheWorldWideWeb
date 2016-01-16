<?


  $message = $_REQUEST["message"]; 
  $n1      = $_REQUEST["n1"]; 
  $n2      = $_REQUEST["n2"]; 
  $good    = $_REQUEST["good"]; 
  $total   = $_REQUEST["total"];  

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











 ?>
<form>
  <?=$message?> <p> 
  What is <?=$n1?> + <?=$n2?> ? Answer: <input type=text name=answer size=4> <p> 
  Press <input type=submit name=action value=Proceed> to send your answer or <input type=submit name=action value=Reset> to restart.  

  <input type=hidden name=message value="<?=$message?>">
  <input type=hidden name=n1      value="<?=$n1?>">
  <input type=hidden name=n2      value="<?=$n2?>">
  <input type=hidden name=good    value="<?=$good?>">
  <input type=hidden name=total   value="<?=$total?>">
</form>

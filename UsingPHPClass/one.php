<?
  include ("template.php"); 

  class One extends Engine {

    function retrieveState() { 
      global $_REQUEST;
      // echo "I am retrieving state...";
      $message = $_REQUEST["message"];
      $n1 = $_REQUEST["n1"];
      $n2 = $_REQUEST["n2"];
      $m1 = $_REQUEST["m1"];
      $m2 = $_REQUEST["m2"];
      return new MyState($message, $n1, $n2, $m1, $m2);
    } 

    function initializeState($s) { 
      // echo "I am being asked to initialize the state...";
      $s->message = "Welcome";
      $s->n1 = rand(-50, 50);
      $s->n2 = rand(-50, 50);
      $s->m1 = "0";
      $s->m2 = "0";
    } 

    function updateState($s) { 
      global $_REQUEST; 
      // echo "I am being asked to update the state based on input...";
      $answer = $_REQUEST["answer"];
      if ($answer && $answer == $s->n1 + $s->n2) { 
        $s->message = "Very good.";
        $s->m1 = $s->m1 + 1;
      } else { 
        $s->message = "No, no, no."; 
      }
      $s->m2 = $s->m2 + 1;
      $s->message .= "Score now: " . $s->m1 . " out of " . $s->m2;
      $s->n1 = rand(-50, 50);
      $s->n2 = rand(-50, 50);
    } 

    function saveState($s) { ?> 
<form>
  <input type=hidden name=message value="<?=$s->message?>">
  <input type=hidden name=n1 value="<?=$s->n1?>"> 
  <input type=hidden name=n2 value="<?=$s->n2?>"> 
  <input type=hidden name=m1 value="<?=$s->m1?>"> 
  <input type=hidden name=m2 value="<?=$s->m2?>">
<?
    } 
    function reportState($s) { ?>
  <?=$s->message?> <p>
  What is <?=$s->n1?> + <?=$s->n2?> ?
<?
    } 
    function getReadyForMoreInput() { ?>
  Answer: <input type=text name=answer> <p>
  <input type=submit name=submit value=Proceed>
  <input type=submit name=reset value=Reset>
</form>
<?
    } 

    function reset() { 
      global $_REQUEST;
      return $_REQUEST["reset"]; 
    } 
  }

  class MyState extends State {
    var $message, $n1, $n2, $m1, $m2; 
    function MyState($message, $n1, $n2, $m1, $m2) {
      $this->message = $message; 
      $this->n1 = $n1; 
      $this->n2 = $n2; 
      $this->m1 = $m1; 
      $this->m2 = $m2; 
    } 
    function isEmpty() {
      return ! $this->message;
    } 
  } 

  $one = new One(); 
  $one->execute(); 

 ?>

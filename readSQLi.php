<?
  $dbc = mysqli_connect('silo.soic.indiana.edu', 'bo', 'whatev3r', 'pacers', 51515)
                      // host                     username password database port 
         or die('I cannot connect and/or select the database.');
  echo "I can connect. <p>";
  echo "I can select the database. <p>";
  $query = "select * from players"; // table of interest
  $result = mysqli_query($dbc, $query)
         or die("I don't see anything in there...");

  print_r($result);
  echo "<hr>";

  while ($row = mysqli_fetch_array($result)){
    print_r ($row); ?>
    <p>
<?
  }
?>

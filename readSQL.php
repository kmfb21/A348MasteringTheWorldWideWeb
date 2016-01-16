<?

  $result = mysql_connect('silo.soic.indiana.edu:51515', 'bo', 'whatev3r');
                          // host                port     username password
  if ($result) {
    if (mysql_select_db("pacers")) { // database
      echo "I can select the database. <p>";
      $query = "select * from players"; // table of interest
      $result = mysql_query($query);
      if (! $result) echo "I don't see anything in here. <p>";
      else {
        $num_cats = mysql_num_rows($result);
        echo "There are " . $num_cats . " records I can see. <p>";
        while ($row = mysql_fetch_row($result)) {
          echo "(" . $row[0] . ", " . $row[1] . ") <p> ";
        }
      }
    } else {
      echo "I can connect but I can't select the database. <p>";
    }
  } else {
    echo "I cannot connect. <p>";
  }
?>

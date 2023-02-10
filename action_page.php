<html>
<?php
 "<br>";echo date("l jS \of F Y h:i:s A") . "<br>";

$a = array("yassin", "Ouail", "Bilal" );
  echo '<table border="1" width="200">';
  for ($i=0; $i < count($a); $i++) {
     echo "<tr><td>{$a[$i]}</td><td>Rotterdam</td></tr>";
    }
    echo "</table>";
 
 echo "<br>";


 echo '<table border="1" width="200">';
 for ($i=0; $i < count($_POST); $i++) { 
    echo "<tr><td>" . array_keys($_POST)[$i] . "</td><td>" . $_POST[array_keys($_POST)[$i]] . "</td></tr>";}
    echo "</table>";

 ?>

</html>

   

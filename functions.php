<?php

function ConnectDb() {
  try {
      $conn = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;

  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

function GetData($table){
    $conn = ConnectDb();
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    return $result;}

    
    function OvzBieren() {
       
        try {
           $result = GetData( "bier");
           PrintTable($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        $conn = null;
    }
    function PrintTable($result) {
        echo "<table border='1px'>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach($row as $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";}
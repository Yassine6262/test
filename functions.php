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

function GetData($conn, $table){
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
    return $result;}

function OvzBieren() {
    $conn = ConnectDb();
    echo "<table border='1'>";
    echo "<tr><th>id</th><th>bieren</th><th>Alcoholpercentage</th></tr>";
  
    try {
       $rows = GetData($conn, "bier");
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row["biercode"] . "</td>";
            echo "<td>" . $row["naam"] . "</td>";
            echo "<td>" . $row["alcohol"] . "</td>";
            echo "</tr>";
        }
  
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo "</table>";
    $conn = null;
  }
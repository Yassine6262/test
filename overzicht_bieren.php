
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>bieren</title>
</head>
<body>
<nav>
    <ul>
      <li><a href="index.html">home</a></li>
      <li><a href="overzicht_bieren.php">bieren</a></li>
    </ul>
  </nav>
    <table border="1">
        <tr>
            <th>Bieren</th>
            <th>Alcohol</th>
        </tr>
        <?php
        try {
            $conn = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM bier"); 
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["naam"] . "</td>";
                echo "<td>" . $row["alcohol"] . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
    </table>
</body>
</html>
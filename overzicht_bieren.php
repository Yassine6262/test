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
        $conn = mysqli_connect("localhost", "root", "", "bieren");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM bier";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["naam"] . "</td>";
                echo "<td>" . $row["alcohol"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
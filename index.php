<html>
<head>
<title>Historia promocji "gorący strzał" x-kom.pl</title>
<meta charset="UTF-8">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '');
</script>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div style="font-size: 9px; text-align: center;"><h1>Historia promocji "gorący strzał"  X-KOM.PL</h1>
<?php

$servername = "";
$username = "";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_set_charset( $conn, 'utf8' );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Sent data

$sql = "SELECT id, data, product, oldprice, newprice, dostepnosc FROM nowa.xkom_dane ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Id</th><th>Data</th><th>Nazwa</th><th>Stara cena</th><th>Cena</th><th>Ilość</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["data"]. "</td><td>" . $row["product"]. "</td><td>" . $row["oldprice"]. "</td><td>" . $row["newprice"]. "</td><td>" . $row["dostepnosc"].  "</td></tr>";
    }  
    echo "</table>";
} else {
    echo "0 results";
}
 
mysqli_close($conn);
?>
</div>
</body>
</html>
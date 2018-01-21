<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />

</head>
<?php
include 'bag.php';

$q=$_REQUEST["q"];
$w=$_REQUEST["w"];
$sql = "select urunID,urunAd from urunler where kategoriID=".$w." and firmaID=".$q."";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["urunID"].">".$row["urunAd"]."</option>";
    }
	echo "</select>";
	
} 

?>
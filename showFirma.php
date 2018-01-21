<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />

</head>
<?php
include 'bag.php';

$q=$_REQUEST["q"];

$sql = "select firmaAd,firmaID from firmalar where firmaID in(select firmaID from urunler where kategoriID=".$q." )";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["firmaID"].">".$row["firmaAd"]."</option>";
    }
	echo "</select>";
	
} 

?>
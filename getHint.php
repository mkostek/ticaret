<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />

</head>
<?php
include 'bag.php';

$q=$_REQUEST["q"];

$sql = "select k.kategoriAd,f.firmaAd,u.urunAd,u.satis from kategori k,urunler u,firmalar f where k.kategoriID=u.kategoriID and u.firmaID=f.firmaID and u.urunID=".$q."";
$result = $conn->query($sql);
?>
<table style="width:100%">
  <tr>
    <th>kategoriadi</th>
    <th>firma adı</th> 
    <th>urun adi</th>
	<th>satis</th>
  </tr>
 
<?php
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo   '<tr><td>'.$row["kategoriAd"].'</td><td>'.$row["firmaAd"].'</td><td>'.$row["urunAd"].'</td><td>'.$row["satis"].'</td></tr>';
    }
	echo "</table>";
	
} 
?>
<?php
require_once "bag.php";
if($_POST)
{
		$id=@$_POST["id"];
$sql = "update siparis set alindi=1 where siparisID=".$id."";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile guncellendi...";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}
?>
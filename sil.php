<?php
include "bag.php";
$r=@$_POST["ad"];
{
	$sql = "delete from siparisdetay where nu=".$r."";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile silindi!";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}?>

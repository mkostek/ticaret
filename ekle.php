<?php
require_once "bag.php";
if($_POST)
{
		$urun=@$_POST["urun"];
		$adet=@$_POST["adet"];
		$enson=@$_POST["enson"];
		if(!$adet|!$enson||!$urun)
		{
				echo "bos alanlar mevcut";
		}
		else
		{
$sql = "INSERT INTO siparisdetay(siparisID,urunID,adet) VALUES (".$enson.",".$urun.",".$adet.")";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile eklendi...<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}
}


<?php
require_once "bag.php";
if($_POST)
{
		$urunad=@$_POST["urunad"];
		$alis=@$_POST["alis"];
		$satis=@$_POST["satis"];
		$firma=@$_POST["firma"];
		$kategori=@$_POST["kategori"];
		if(!$alis||!$satis||!$firma||!$kategori||!$urunad)
		{
				echo "bos alanlar mevcut";
		}
		else
		{
$sql = "insert into urunler(urunad,firmaID,kategoriID,alis,satis) values('".$urunad."',".$firma.",".$kategori.",".$alis.",".$satis.") ";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile eklendi...<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}

}

?>
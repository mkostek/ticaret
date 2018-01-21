
<?php
require_once "bag.php";
if($_POST)
{
		$ad=@$_POST["ad"];
		$soyad=@$_POST["soyad"];
		$tel=@$_POST["tel"];
		$adres=@$_POST["adres"];
		if(!$ad||!$soyad||!$tel||!$adres)
		{
				echo "bos alanlar mevcut";
		}
		else
		{
$sql = "insert into musteri(ad,soyad,tel,adres) values('".$ad."','".$soyad."','".$tel."','".$adres."') ";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile eklendi...<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}

}

?>
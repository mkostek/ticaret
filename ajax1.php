
<?php
require_once "bag.php";
session_start();
if($_POST)
{
		$id=@$_POST["id"];
		$adres=@$_POST["adres"];
		$tarih=@$_POST["tarih"];
		if(!$adres||!$id||!$tarih)
		{
				echo "bos alanlar mevcut";
		}
		else
		{
$sql = "insert into siparis(musteriID,tarih,adres,alindi) values(".$id.",'".$tarih."','".$adres."',0) ";

if ($conn->query($sql) === TRUE) {
    echo " başarı ile eklendi...";
	$last_id = $conn->insert_id;
		$_SESSION['id']=$last_id;
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}

}

?>
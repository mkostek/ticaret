
<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>  $( function() {

						$.ekle=function(){
var kategori=$( "#kategori" ).val();
var firma=$( "#firma" ).val();
var alis=$("input[name=alis]").val();
var satis=$("input[name=satis]").val();
var urunad=$("input[name=urunad]").val();
if(!urunad||!kategori||!firma||!alis||!satis)
{
alert("bos alanlar mevcut");
}
else{
var degerler="alis="+alis+"&satis="+satis+"&firma="+firma+"&kategori="+kategori+"&urunad="+urunad;
$.ajax({
type:"POST",
url:"urunekle.php",
data:degerler,
success:function(cevap){alert(cevap);}
});
location.reload();
}
						}
			} )

			</script>
</head><?php
include "nav.html";
include "bag.php";
?>
<form action="" method="post" onclick="return false;">
<?php
$sql = "SELECT * FROM  kategori";
$result = $conn->query($sql);
echo 'kategori seçiniz:<select name="kategori" id="kategori">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["kategoriID"].">".$row["kategoriAd"]."</option>";
    }
} 
    echo "</select><br>";
	
$sql = "SELECT * FROM  firmalar";
$result = $conn->query($sql);
echo 'firmayı seçiniz:<select name="firma" id="firma">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["firmaID"].">".$row["firmaAd"]."</option>";
    }
} 
    echo "</select><br>";	
	
	
?>
alis fiyatı:<input type="text" name="alis"><br>
satis fiyatı:<input type="text" name="satis"><br>
urun adı:<input type="text" name="urunad"><br>
<input type="button" onclick="$.ekle()" value="gonder">
</form>



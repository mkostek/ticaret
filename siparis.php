<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-9″ />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="sitil.css">
  <script>  $( function() {
	  $( "#datepicker" ).datepicker();
						$.konuekle=function(){
var ad=$("input[name=ad]").val();
ad=$.trim(ad);
var soyad=$("input[name=soyad]").val();
soyad=$.trim(soyad);
var tel=$("input[name=tel]").val();
tel=$.trim(tel);
var adres=$("textarea[id=adresi]").val();
adres=$.trim(adres);
if(!ad||!soyad||!tel||!adres)
{
alert("bos alanlar mevcut");
}
else{
var degerler="ad="+ad+"&soyad="+soyad+"&tel="+tel+"&adres="+adres;
$.ajax({
type:"POST",
url:"ajax.php",
data:degerler,
success:function(cevap){alert(cevap);}
});
location.reload();
}
						}
						
$.ekle=function(){
var id=$("select[name=musteri]").val();
var adres=$("textarea[id=adres]").val();
adres=$.trim(adres);
 var dateTypeVar = $('#datepicker').datepicker('getDate');
      var tarih= $.datepicker.formatDate('yy-mm-dd', dateTypeVar);
tarih=$.trim(tarih);
if(!id||!tarih||!adres)
{
alert("bos alanlar mevcut");
}
else{
var degerler="id="+id+"&tarih="+tarih+"&adres="+adres;
$.ajax({
type:"POST",
url:"ajax1.php",
data:degerler,
success:function(cevap){alert(cevap);}
});
window.setTimeout(function(){

        // Move to a new location or you can do something else
		window.alert("3 sn içinde ürün ekleme sayfasına yönlendirileceksiniz... ");
        window.location.href = "siparisekle.php";

    }, 3000);
}
						}
			} )

</script>
</head>
<form action="" method="post" onclick="return false;">
<?php
include "nav.html";
include "bag.php";
$sql = "SELECT * FROM  musteri order by ad,soyad";
$result = $conn->query($sql);
echo 'satışı alan kişi:<select name="musteri">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option value=".$row["musteriID"].">".$row["ad"]." ".$row["soyad"]."</option>";
    }
} 
    echo "</select><br>";
?>
tarihi giriniz:<input type="text"  id="datepicker" class="datepicker"><br>
adres:<textarea id="adres" name="adres" rows="10" cols="30">
</textarea>
<button onclick="$.ekle()">gonder</button>
</form>
<form action="" method="post" onclick="return false;">
<h3>yeni bir kişi eklemek için</h3><br>
ad:<input type="text" name="ad" /><br>
soyad:<input type="text" name="soyad" /><br>
tel:<input type="text" name="tel" /><br>
adres<textarea id="adresi" rows="10" cols="30"></textarea>
<button onclick="$.konuekle()">musteri</button>
 <td></td>
</form>



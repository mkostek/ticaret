<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
<link rel="stylesheet" type="text/css" href="sitil.css">
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>
$( function() {
	  $.sil=function(){
var ad=$("#sil").val();
var degerler="ad="+ad;
$.ajax({
type:"POST",
url:"sil.php",
data:degerler,
success:function(cevap){alert(cevap);}
});location.reload();
}
$.ekle=function(){

var adet=$("input[name=adet]").val();
var enson=$("input[name=enson]").val();
var urun=$("#urun").val();
if(!urun||!enson||!adet)
{
alert("bos alanlar mevcut");
}
else{
var degerler="adet="+adet+"&enson="+enson+"&urun="+urun;
$.ajax({
type:"POST",
url:"ekle.php",
data:degerler,
success:function(cevap){alert(cevap);}
});
location.reload();
}
						
			} });
			function showHint()
			{

			var str=document.getElementById("urun").value;
			if(str=="")
			{
			document.getElementById("calis").innerHTML="";
			return;
			}else
			{
			if(window.XMLHttpRequest)
			{
			xmlhttp=new XMLHttpRequest();
			}
			else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
			{
			document.getElementById("calis").innerHTML=xmlhttp.responseText;
			}
			};
			xmlhttp.open("GET","getHint.php?q="+str,true);
			xmlhttp.send();
			}
			}
			function showFirma()
			{
				var str=document.getElementById("kategori").value;
				if(str=="")
			{
			document.getElementById("kategori").innerHTML="";
			return;
			}else
			{
			if(window.XMLHttpRequest)
			{
			xmlhttp=new XMLHttpRequest();
			}
			else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
			{
			document.getElementById("firma").innerHTML=xmlhttp.responseText;
			}
			};
			xmlhttp.open("GET","showFirma.php?q="+str,true);
			xmlhttp.send();
			}
			}
			
			function showUrun()
			{
			var str=document.getElementById("firma").value;
			var s=document.getElementById("kategori").value;
			
			if(str=="")
			{
			document.getElementById("urun").innerHTML="";
			return;
			}else
			{
			if(window.XMLHttpRequest)
			{
			xmlhttp=new XMLHttpRequest();
			}
			else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if(xmlhttp.readyState==4&&xmlhttp.status==200)
			{
			document.getElementById("urun").innerHTML=xmlhttp.responseText;
			}
			};
			xmlhttp.open("GET","showUrun.php?q="+str+"&w="+s,true);
			xmlhttp.send();
			}		
			}
			
		</script>
<?php
session_start();include "nav.html";
include "bag.php";
/*
	if(isset($_GET['tarih']) && isset($_GET['musteri'])&& isset($_GET['adres']) ) {
	$sql = "INSERT INTO siparis(musteriID,tarih,adres,alindi) VALUES (".$_GET["musteri"].",'".$_GET['tarih']."','".$_GET['adres']."',0)";
	if ($conn->query($sql) === TRUE) {
		
		$last_id = $conn->insert_id;
		$_SESSION['id']=$last_id;
    echo "Yeni sipariş  bilgisi eklendi<br>";
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}*/

?>
<form action="" method="post" onclick="return false;">
<?php
$sql = "SELECT * FROM  kategori";
$result = $conn->query($sql);
echo 'kategori seciniz:<select name="kategori" id="kategori" onclick="showFirma()">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option selected value=".$row["kategoriID"].">".$row["kategoriAd"]."</option>";
    }
} 
    echo "</select><br>";
	
$sql = "SELECT * FROM  firmalar";
$result = $conn->query($sql);
echo 'firmayi seciniz:<select name="firma" id="firma" onclick="showUrun()">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option selected value=".$row["firmaID"].">".$row["firmaAd"]."</option>";
    }	
} 
    echo "</select><br>";	
	
$sql = "SELECT * FROM  urunler";
$result = $conn->query($sql);
echo 'urun seciniz:<select name="urun" id="urun" onclick="showHint()">';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo	"<option select value=".$row["urunID"].">".$row["urunAd"]."</option>";
    }
} 
    echo "</select><br>";		


?><h3>alış veriş sepeti<h3>
<table style="width:100%">
  <tr>
    <th>urun adı</th>
    <th>firma adı</th> 
    <th>kategori adı</th>
	<th>adet </th>
	<th>satis </th>
	<th></th>
  </tr>
<?php $sql = "SELECT s.nu,f.firmaAd,k.kategoriAd,u.urunAd,s.adet,u.satis
FROM siparisdetay s,urunler u,kategori k,firmalar f ,siparis si
where u.urunID=s.urunID and f.firmaID=u.firmaID and u.kategoriID=k.kategoriID and  si.siparisID=s.siparisID  and  si.siparisID=".$_SESSION['id']."";?>
<p id="calis"></p>adetı:<input type="text" name="adet"><br>
<input type="hidden" name="enson" value="<?php echo $_SESSION['id'];?>"/>


<button id='ekle' onclick='$.ekle()'  >ekle</button>
</form>
<form action="" method="post" onclick="return false;">
<?php
$result = $conn->query($sql);
$total=0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {  
		echo	"<tr><th>".$row["urunAd"]."</th>
    <th>".$row["firmaAd"]."</th> 
    <th>".$row["kategoriAd"]."</th>
	<th>".$row["adet"]."</th>
    <th>".$row["satis"]."</th>
	<th><button id='sil' onclick='$.sil()'  value=".$row["nu"].">sil</button></th></tr>";
	$total+=$row["adet"]*$row["satis"];
	}
	echo "<tr><th></th>
    <th></th> 
    <th></th>
	<th></th>
    <th>toplam:".$total."</th></tr>";
	echo "</table></form>";
} ?>

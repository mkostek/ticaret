<head>
<link rel="stylesheet" type="text/css" href="sitil.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script>
$(document).ready(function(){
$("button").click(function(){
	  var id=$(this).attr("class");
	  var degerler="id="+id;
$.ajax({
type:"POST",
url:"guncelle.php",
data:degerler,
success:function(cevap){alert(cevap);}
});location.reload();
    });
$("tr").click(function(){
	  var y=$(this).attr("class");
	  

	  $("tr#iki").hide("1000");
	  $("tr."+y).show("2000");
    });
	
});</script>
</head>
<?php include "nav.html";include 'bag.php'; 
?>
<form action="" method="post" onclick="return false;">
<h3>alış veriş listedekiler<h3>

<table style="width:100%">
  <tr>
    <th>ad</th>
    <th>soyad</th> 
    <th>adres(birinci)</th>
	<th>adres(ikinci) </th>
	<th>telefon </th>
	<th>satis toplam tutar </th>
	<th>alindi</th>
  </tr>
<?php $sql = "select s.siparisID,m.ad,m.soyad,m.tel,s.adres as 'birinci',m.adres 'ikinci',sum(si.adet*u.satis)  as 'tutar'
from musteri m,siparis s,siparisdetay si,urunler u where u.urunID=si.urunID and s.siparisID=si.siparisID and m.musteriID=s.musteriID and s.alindi=0
 group by s.siparisID";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {  
		echo	"<tr class=".$row['siparisID']." id='bir'><th>".$row["ad"]."</th>
    <th>".$row["soyad"]."</th> 
    <th>".$row["birinci"]."</th>
	<th>".$row["ikinci"]."</th>
	<th>".$row["tel"]."</th>
    <th>".$row["tutar"]."</th>
	<th><button class=".$row['siparisID']."  value='tahsilet' >al</button></th></tr> <br>";
$s="select k.kategoriAd,f.firmaAd,u.urunAd,si.adet,u.satis 
from siparisdetay si,urunler u,kategori k,firmalar f 
where si.urunID=u.urunID and k.kategoriID=u.kategoriID and f.firmaID=u.firmaID and si.siparisID=".$row['siparisID']."";
$re= $conn->query($s);
if ($re->num_rows > 0) {
   while($ro = $re->fetch_assoc()) {  
		echo	"<tr class=".$row['siparisID']." id='iki'><th>".$ro["kategoriAd"]."</th>
    <th>".$ro["firmaAd"]."</th> 
    <th>".$ro["urunAd"]."</th>
	<th>".$ro["adet"]."</th>
    <th>".$ro["satis"]."</th></tr><br>";
}
}
}} echo "</table></form>";
?>	
	
	


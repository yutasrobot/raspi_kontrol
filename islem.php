<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>BiKiR -Beagleboard ile Kablosuz İletişimli Robot Site Kontolü Denemesi</title>
	<link href="css/styles.css" media="screen" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<?php
	$service_port = $_POST["port"];   
	$address = $_POST["ip"];

#echo $service_port;
#echo $address;

	$_SESSION["ip"] = $address;  
	$_SESSION["port"] = $service_port; 
?>


<script type="text/javascript">
function loadXMLDoc(str)
{
 var xmlhttp;
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
 
//*****gönder.php ye girilen string gönderiliyor ********

xmlhttp.open("GET","gonder.php?q="+str,true);
xmlhttp.send();	
}

function makeData(form,yon)
{ 
    var sendData = 'l';  
    sendData +=  form.led1[0].checked ? form.led1[0].value : form.led1[1].value;  //bunu seviyorum iþte
	sendData +=  form.led2[0].checked ? form.led2[0].value : form.led2[1].value;
    document.getElementById("myDiv").innerHTML = sendData;

    loadXMLDoc(sendData);
}

</script>
<body>
	<div id="page">
		<div id="site_title">
			<span>BiKiR - Beagleboard ile Kablosuz İletişimli Robot</span>
		</div>
		<div id="primary_content">
			<div id="menu">
				<ul>
					<li><span class="color01">01</span> <a href="#">DİZAYN</a></li>
					<li><span class="color02">02</span> <a href="#">AŞAMALAR</a></li>
					<li><span class="color03">03</span> <a href="#">KODLAR</a></li>
					<li><span class="color04">04</span> <a href="maliyet.html">MALİYET</a></li>
					<li><span class="color05">05</span> <a href="socket.html">Web Kontrol(beta)</a></li>
				</ul>
			</div>
	<div id="page_content">
				<h1>Web Kontrol</h1>		
<form action="" name = "salla" >	
		<input type="radio" name="led1" value = "1" /> On <br>
        <input type="radio" name="led1" value = "0" /> Off<br><br>
		<input type="radio" name="led2" value = "1" /> On <br>
        <input type="radio" name="led2" value = "0" /> Off<br><br>
		<button type="button" onclick="makeData(salla,'2')">Gönder</button></td><br>
</form>
</div>
<div id="myDiv"><h3> Gönderilen data</h3></div>
</body>

</html>

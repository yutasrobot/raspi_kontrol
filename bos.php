<?php
session_start();
?>

<?php
	$service_port = $_POST["port"];   
	$address = $_POST["ip"];

	echo $service_port;
	echo $address;

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
    var sendData = 'h';  
  
    //Hýz
    if(parseInt(form.hiz.value) < 0)
      form.hiz.value *= -1;
	  
    if(parseInt(form.hiz.value) > 255)
      form.hiz.value = 255;
	
	var i = form.hiz.value.length;
	
    if(i == 0)
		sendData += '000';
    else if(i == 1)
		sendData += '00' + form.hiz.value;
	else if(i == 2)
		sendData += '0' + form.hiz.value;
	else 
		sendData +=  form.hiz.value;
  
    sendData += 'y' + yon + 's0t';
	
	//süre
	i = form.sure.value.length;	
	
	if(i == 0)
	    sendData += "0000";
	else if(i == 1)
		sendData += "000" + form.sure.value;
	else if (i == 2)
		sendData += "00" + form.sure.value;
	else if (i == 3)
		sendData += "0" + form.sure.value;
	else if (i == 4 && parseInt(form.sure.value) <= 3000)
		sendData += form.sure.value;
	else
		sendData += "3000";	
	

    //sendData += form.sure.value;
  
    sendData += 'l';
    sendData +=  form.led[0].checked ? form.led[0].value : form.led[1].value;  //bunu seviyorum iþte
  
    sendData += 'm';
    sendData += form.music.value;
  
    document.getElementById("myDiv").innerHTML = sendData;

    loadXMLDoc(sendData);
}

</script>

<form action="" name = "salla" >
HIZ : &nbsp <input type="text" name="hiz" style="width:43px; height:22px;" /> <br>
SURE: <input type="text" name="sure" style="width:43px; height:22px;" /><br><br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
		<button type="button" onclick="makeData(salla,'2')">Ýleri</button></td><br>
		<button type="button" onclick="makeData(salla,'1')">Sola</button>
		<button type="button" onclick="makeData(salla,'5')">Geri</button>
		<button type="button" onclick="makeData(salla,'3')">Saða</button><br><br>
		<input type="radio" name="led" value = "1" /> On <br>
        <input type="radio" name="led" value = "0" /> Off<br><br>
		MÜZÝK: <input type="text" name="music" style="width:43px; height:22px;"/><br>
</form>

<div id="myDiv"><h2> Gönderilen data ve sonuçun yazýldýðý yer</h2></div>

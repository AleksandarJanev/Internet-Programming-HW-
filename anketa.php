<?php
include "glasaj.php";
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript">
function glasajanketa(int)
{
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
    document.getElementById("anketa").innerHTML=xmlhttp.responseText;
    
    }
  }
  xmlhttp.open("GET","glasaj.php?id=" + int,true);
  xmlhttp.send(null);
}
</script>
</head>

<strong>Whats the most interesting?</strong>

<div id="anketa">
<?php

$host = "localhost";
$username = "root";
$pass = "";
$con = mysqli_connect($host, $username, $pass, "anketadb");

if(!$con){
  //Kill everything off die();
  die("Connection failed: " . mysqli_connect_error());
}


$rezultat=mysqli_query("select * from anketa order by prashanje");

while($red=mysqli_fetch_array($rezultat)){
 $id=$red["id_anketa"];
 $prashanje=$red["prashanje"];
 
 ?>
 <input type="radio" name="opcija" id="opcija" onclick="glasajanketa(this.value)" value="<?php echo $id;?>" > <?php echo $prashanje; ?>
<br><br>
<?php
} ?> 

</div>
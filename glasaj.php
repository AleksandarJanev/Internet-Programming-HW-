<?php

include "anketa.php";
?>

<?php
$id= $_GET["id"];

$host = "localhost";
$username = "root";
$pass = "";
$con = mysqli_connect($host, $username, $pass, "anketadb");

if(!$con){
    //Kill everything off die();
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_query("update anketa set glasovi=glasovi+1 where id_anketa=".$id);

echo "Rezultati <br><br>";


$rezultat=mysqli_query("select * from anketa order by glasovi desc");
while ($red=mysqli_fetch_array($rezultat)){

 $prashanje=$red["prashanje"];
 $glas=$red["glasovi"];
 
 echo $prashanje . " - " . $glas . "<br><br>";


}

mysqli_close($con);

?>
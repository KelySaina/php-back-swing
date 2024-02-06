
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetjavaa";
$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connexion echouee:" .$conn->connect_error);

}
?>
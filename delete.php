<?php
$servername = "localhost";
$username ="root";
$password = "";
$db = "ourtable";
$con = new mysqli($servername,$username,$password,$db);
$nim = $_GET['nim'];
if($con==false){
    die("Connection Failed: ". $con->connect_eror);
}
$sql = "DELETE FROM mahasiswa WHERE nim='$nim'";

if ($con->query($sql) === TRUE) {
	header("http://localhost/formdatabase/ta7/home.php");
    echo "Note : <br> <font color='green'>Data dengan Nim $nim berhasil di hapus</font>";
    echo "<br><a href='home.php'>BACK TO HOME </a>";
} else {
    echo "Error deleting record: " . $conn->error;
}
 ?>
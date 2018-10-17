<?php
$servername = "localhost";
$username ="root";
$password = "";
$db = "ourtable";
$con = new mysqli($servername,$username,$password,$db);
if($con==false){
    die("Connection Failed: ". $con->connect_eror);
}
$sql = mysqli_query($con,"SELECT * FROM mahasiswa");
?>
<form action="" method=POST>
       <nav>
        <tr>
        <td><a href="forminput.php"> INPUT NEW DATA </a></td> | <td><input type="text" name="nim" placeholder="SEARCH NIM" width="30px;"><input type="submit" name="find" value="SEARCH"></td>
        </tr> <br><br>
        </nav>
    <table border="1" cellpadding="0" cellspacing="0" width="400px'">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Action</th>
        </tr>
        <?php 
        if(mysqli_num_rows($sql)>0){ 
            $no = 1;
            while($data = mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td align="center"><?php echo $no ?></td>
            <td align="center"><?php echo $data["nama"];?></td>
            <td align="center"><?php echo $data["nim"];?></td>
            <td align="center"><a href="delete.php?nim=<?=$data['nim']?>">Delete</a> | <a href="detail.php?nim=<?=$data['nim']?>">Detail</a></td>
            <td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</form>

<?php
if(isset($_POST['find'])) {
$nim = $_POST['nim'];
$sql2 ="SELECT * FROM mahasiswa WHERE nim ='$nim'";
$result = $con->query($sql2);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Hasil Pencarian : <br> Nim    :" . $row["nim"]. "<br>Nama :" . $row["nama"];
    }
} else {
    echo "Hasil Pencarian : <br><font color='red'>Data yang di cari tidak di temukan</font>";
}
} 
 ?>

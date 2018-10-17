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
$sql ="SELECT * FROM mahasiswa WHERE nim ='$nim'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        echo "Detail Data : <br> Nim    :" . $row["nim"]. "<br>Nama :" . $row["nama"]. "<br>Jenis Kelamin :" . $row["jeniskelamin"]. "<br>Prodi :" . $row["prodi"]. "<br>Fakultas :" . $row["motto"];
    }
}else {
    echo "Data mungkin tidak tersedia " . $con->error;
}
 ?>
 <form action="#" method="POST" name="update">
<nav>
<td>FORM UPDATE DATA MAHASISWA</td>
</nav>
<table>
<br>
<tr>
<td>NIM</td> <td>:</td> <td><input type="number" name="nim"></td>
</tr>

<tr>
<td>Nama</td> <td>:</td> <td><input type="text" name="nama"></td>
</tr>

<tr>
<td>Jenis Kelamin</td> <td>:</td> <td><input type="radio" name="gender" value="Laki-Laki" />Male <input type="radio" name="gender" value="Perempuan" />Female</td>
</tr>

<tr>
<td>Prodi</td><td>:</td><td><select name="prodi"><option disabled selected value> -- select an option -- </option> <option value="D3 MANAJEMEN INFORMATIKA">D3 MANAJEMEN INFORMATIKA</option> <option value="D3 PERHOTELAN">D3 PERHOTELAN</option> 
<option value="S1 TEKNIK INFORMATIKA">S1 TEKNIK INFORMATIKA</option> <option value="S1 DKV">S1 DKV</option>  </select></td>
</tr>

<td>Fakultas</td><td>:</td><td><select name="fakultas"><option disabled selected value> -- select an option -- </option> <option value="FTE">Fakultas Teknik Elektro</option> <option value="FIT">Fakultas Ilmu Terapan</option> 

<option value="FEB">Fakultas Ekonomi Bisnis</option> <option value="FIK">Fakultas Ilmu Kreatif</option>  </select></td>

<tr>
<td>Motto</td><td>:</td>
<td><textarea name="moto"></textarea></td>
</tr>

<tr>

<td></td><td></td><td align="right"><input type="submit" name="registrasi" value="Perbarui"></td>

</tr>

</table>

</form>
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
if (isset($_POST['registrasi'])){
$nim2 = $_POST['nim'];
$nama = $_POST['nama'];
$jk = $_POST['gender'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$motto = $_POST['moto'];
	$sql ="UPDATE mahasiswa SET nim = '$nim2', nama= '$nama', jeniskelamin= '$jk', prodi= '$prodi', fakultas= '$fakultas', motto= '$motto' WHERE nim = '$nim ';";
	if (mysqli_query($con,$sql)){
		echo "Data Berhasil Di perbarui <br> <a href='home.php'>Back To Home</a>";
	}else{
		echo "Gagal Memperbarui Data";
	}
	}
 ?>
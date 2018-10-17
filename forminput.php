<form action="#" method="POST">
<nav>
<td>FORM INPUT DATA MAHASISWA BARU</td> | <td><a href="home.php"> VIEW DATA MAHASISWA </a></td>
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

<td></td><td></td><td align="right"><input type="submit" name="registrasi" value="Registrasi"></td>

</tr>

</table>

</form>

<?php
$servername = "localhost";
$username ="root";
$password = "";
$db = "ourtable";
$con = new mysqli($servername,$username,$password,$db);
if($con==false){
	die("Connection Failed: ". $con->connect_eror);
}
if (isset($_POST['registrasi'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jk = $_POST['gender'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$motto = $_POST['moto'];
	$sql ="INSERT INTO mahasiswa (nim,nama,jeniskelamin,prodi,fakultas,motto) values ('$nim','$nama','$jk','$prodi','$fakultas','$motto')";
	if (mysqli_query($con,$sql)){
		echo "REGISTRASI BERHASIL";
	}else{
		echo "REGISTRASI GAGAL";
	}
	}
?>
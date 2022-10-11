<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		$id = $_GET['id'];

		$query = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE NIM='$id'");
		$row = mysqli_fetch_array($query);

	}else{
		header("location:index.php");
	}
}else{
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>FORM PENGISIAN DATA MAHASISWA</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>FORM PENGISIAN DATA MAHASISWA</h2></center>
		<hr>
		<form action="edit_act.php" method="post" enctype="multipart/form-data">
		<div class="mb-3">
				<label class="form-label">NIM</label>
				<input type="text" name="nim" class="form-control" value="<?php echo $row['nim']; ?>" >
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" >
			</div>
			<div class="mb-3">
				<label class="form-label">email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">jurusan</label>
				<input type="text" name="prodi" class="form-control" value="<?php echo $row['prodi']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">fakultas</label>
				<input type="text" name="fakultas" class="form-control" value="<?php echo $row['fakultas']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Pas Foto</label>
				<input type="file" name="gambar" class="form-control">
				<br>
				<?php 
				if ($row['gambar'] == "") { ?>
					<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
				<?php }else{ ?>
					<img src="foto/<?php echo $row['gambar']; ?>" style="width:100px;height:100px;">
				<?php } ?>
			</div>
			<div class="mb-3">
				<button class="btn btn-success" type="submit">Submit</button>
				<a href="index.php" class="btn btn-danger">Kembali</a>
			</div>
		</form>
		
	</div>
</body>
</html>
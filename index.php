<?php 

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark  ">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php">Cari Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index1.php">Tambah Data Mahasiswa</a>
            </li>
        </ul>
    </nav>
    <div class="container col-md-11">
            <div class="card">
                <div class="card-body">
                    <a href="index1.php" class="btn btn-primary">Tambah Data</a>
                    <p></p>
                    <table class="table table-bordered">
                        <tr>
                            <th><center>ID</center></th>
                            <th><center>NPM</center></th>
                            <th><center>Nama</center></th>
                            <th><center>Tempat Lahir</center></th>
                            <th><center>Tanggal Lahir</center></th>
                            <th><center>Jenis Kelamin</center></th>  
                            <th><center>Alamat</center></th>  
                            <th><center>Kode Pos</center></th>
                            <th><center>Opsi</center></th>
                        </tr>
                        <?php 
                            include "koneksi.php";
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM mhs");
                            while($data=mysqli_fetch_array($tampil))
                            {
                        ?>
                        <tr>
                            <td> <?php echo $no++; ?> </td>
                            <td> <?php echo $data['npm']; ?> </td>
                            <td> <?php echo $data['nama']; ?> </td>
                            <td> <?php echo $data['tempat_lahir']; ?> </td>
                            <td> <?php echo $data['tanggal_lahir']; ?> </td>
                            <td> <?php echo $data['jenis_kelamin']; ?> </td>
                            <td> <?php echo $data['alamat']; ?> </td>
                            <td> <?php echo $data['kode_pos']; ?> </td>
                            <td>
                                <a href="edit_mahasiswa.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>

                                
                            <?php } ?>

                    </table>
                    <a href="index.php?logout=true" class="btn btn-sm btn-danger">Logout</a>  
                </div>
            </div>
        </div>
    </body>
</html>
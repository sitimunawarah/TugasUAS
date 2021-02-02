<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "SELECT * FROM mhs WHERE id='$id'");
    $data=mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Data Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php">Cari Mahasiswa</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index1.php">Tambah Data Mahasiswa</a>
            </li>
        </ul>
    </nav>
    <div class="container col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" class="form-item">

                <div class="form-group">
                        <label for="npm">NPM Mahasiswa</label>
                        <input type="number" name="npm" value="<?php echo $data['npm'] ?>" class="form-control col-md-20" placeholder="Masukkan NPM Mahasiswa">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mahasiwa</label>
                        <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control col-md-20" placeholder="Masukkan Nama Mahasiswa">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?>" class="form-control col-md-20" placeholder="Masukkan Tempat Lahir Mahasiswa">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <div>
                            <select name="tgl" size="1" id="tgl">
                                <?php
                                for ($i=1;$i<=31;$i++)
                                {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                            </select>
                            <select name="bln" size="1" id="bln">
                                <?php
                                $bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                for ($i=1;$i<=12;$i++)
                                {
                                     echo "<option value=".$i.">".$bulan[$i]."</option>";
                                }
                                ?>        
                            </select>
                            <select name="thn" size="1" id="thn">
                                <?php
                                for ($i=1980;$i<=2000;$i++)
                                {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="radio" name="jenis_kelamin" value="L" checked> Laki Laki
                        <input type="radio" name="jenis_kelamin" value="P" checked>Perempuan
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control col-md-20" placeholder="Masukkan Alamat Mahasiswa">
                    </div>

                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="number" name="kode_pos" value="<?php echo $data['kode_pos'] ?>" class="form-control col-md-20" placeholder="Masukkan Kode Pos">
                    </div>

                    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                    <button type="reset" class="btn btn-danger">BATAL</button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>

<?php
        if(isset($_POST['simpan']))
        {
            $npm            = $_POST['npm'];
            $nama           = $_POST['nama'];
            $tempat_lahir   = $_POST['tempat_lahir'];
            $tanggal_lahir  = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $jenis_kelamin  = $_POST['jenis_kelamin'];
            $alamat         = $_POST['alamat'];
            $kode_pos       = $_POST['kode_pos'];

            mysqli_query($koneksi, "UPDATE mhs 
            SET npm='$npm', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', alamat='$alamat', kode_pos='$kode_pos'
            WHERE id='$id'") or die(mysqli_error($koneksi));

            echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang DiUpdate.... </h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/web-kampus/index.php'>";
        }
?>
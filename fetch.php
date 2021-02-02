<?php
$connect = mysqli_connect("localhost", "root", "", "kampus");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM mhs 
	WHERE npm LIKE '%".$search."%'
	OR nama LIKE '%".$search."%' 
	OR tempat_lahir LIKE '%".$search."%' 
	OR tanggal_lahir LIKE '%".$search."%' 
	OR jenis_kelamin LIKE '%".$search."%'
	OR alamat LIKE '%".$search."%'
	OR kode_pos LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM mhs ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>NPM</th>
							<th>Nama</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>kode Pos</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["npm"].'</td>
				<td>'.$row["nama"].'</td>
				<td>'.$row["tempat_lahir"].'</td>
				<td>'.$row["tanggal_lahir"].'</td>
				<td>'.$row["jenis_kelamin"].'</td>
				<td>'.$row["alamat"].'</td>
				<td>'.$row["kode_pos"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
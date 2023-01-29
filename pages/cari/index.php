<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login/login.php");

$SQL = "SELECT * FROM mahasiswa";
$query_results = mysqli_query($conn, $SQL);
$rows = [];

while ( $row = mysqli_fetch_assoc($query_results) ) 
{
  $rows[] = $row;
}


?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<!-- Font Awesome 6 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	
	<!-- App css -->
	<link rel="stylesheet" href="../../src/index.css">

	<!-- Poppins Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Init new DataTables using jquery -->
    <script type="text/javascript" charset="utf-8">
      $(document).ready( function () {
        $('#table_id').DataTable({
          'scrollX': true
        });
      });
    </script>
   
   <title>Cari data Mahasiswa</title>
  </head>
  <body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Cari data Mahasiswa</a>
    </div>
  </nav>
  
  <main class="container-md">
    <!-- Jumbotron -->
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2><i class="fa fa-search" style="font-size:78px;color:black"></i></h2>
      <p>Cari data mahasiswa meliputi NIM, nama, program studi, dan Status</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->
    
    <!-- Create New Mahasiswa -->
<?php

if (isset( $_GET["res"] ))
{
  switch ($_GET["res"]) {
  case 1 :
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil disimpan</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  case 0 : 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Berhasil disimpan</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  }
}

?>
    <!-- Table -->
    <section class="container md:d-flex justify-content-center gap-3">
      <table id="table_id" class="table table-bordered table-striped" style="width: 100%;">
        <thead>
          <tr>
            <td>No</td>
            <td>NPM</td>
            <td>Nama</td>
            <td>Program Studi</td>
            <td>Semester</td>
            <td>Kelas</td>
            <td>Tahun Angkatan</td>
            <td>Status</td>
          </tr>
        </thead>
      <tbody>
<?php
$num = 0;
foreach($rows as $row) {
  // Parse array
  $id = $row["id"];
  $NIM = $row["NIM"];
  $nama = $row["nama"];
  $program_studi = $row["program_studi"];
  $semester = $row["semester"];
  $kelas = $row["kelas"];
  $tahun_angkatan = $row["tahun_angkatan"];
  $status_mahasiswa = $row["status_mahasiswa"];
  $num++;
  echo <<<EOT
    <tr>
      <td>$num</td>
      <td>$NIM</td>
      <td>$nama</td>
      <td>$program_studi</td>
      <td>$semester</td>
      <td>$kelas</td>
      <td>$tahun_angkatan</td>
      <td>$status_mahasiswa</td>
    </tr>

  EOT;
}
?>
        <tbody>
      </table>
        <div class="modal-footer">
          <a href="../../index.php" class="btn btn-warning">Kembali</a>
        </div>
    </section>
  </main>



   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

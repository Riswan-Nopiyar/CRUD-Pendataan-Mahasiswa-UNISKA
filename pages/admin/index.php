<?php
session_start();

require "../../koneksi/koneksi.php";

if ( empty( $_SESSION["login"] ) ) header ("Location: ../../login/login.php");

$SQL = "SELECT * FROM admin";
$query_results = mysqli_query($conn, $SQL);
$rows = [];

while ( $row = mysqli_fetch_assoc($query_results) ) $rows[] = $row;

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	<link rel="stylesheet" href="../../src/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Menu Admin</title>
  </head>
  <body>

  
  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Admin</a>
    </div>
  </nav>

  <main class="container-md">
    <!-- Jumbotron -->
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Admin</h2>
      <p>lihat data admin dan password</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->

    
    <div class="container-md mb-5">
      <a class="px-3 btn btn-danger" href="logout.php">Log Out</a>
    </div>

    <form action="update.php" method="POST" enctype="multipart/form-data">  
<?php

$username = $rows[0]["username"];
$password = $rows[0]["password"];

echo <<<EOT
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" name="username" value="$username" readonly>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="$password" readonly>
  </div> 

EOT;
?>
    </form>
    <div class="modal-footer">
          <a href="../../index.php" class="btn btn-warning">Kembali</a>
        </div>
    </main>
    

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login.php?res=2");

if ( isset( $_POST["create"] ) )
{
  // Parse array
  $NIM = $_POST["NIM"];
  $nama = $_POST["nama"];
  $program_studi = $_POST["program_studi"];
  $semester = $_POST["semester"];
  $kelas = $_POST["kelas"];
  $tahun_angkatan = $_POST["tahun_angkatan"];
  $status_mahasiswa = $_POST["status_mahasiswa"];

  $SQL = "INSERT INTO mahasiswa VALUES (NULL, '$NIM', '$nama', '$program_studi', '$semester', '$kelas', '$tahun_angkatan', '$status_mahasiswa')";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}

?>

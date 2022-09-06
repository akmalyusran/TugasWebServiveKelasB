<?php
  require_once('dbconn.php');
  require_once('lib/nusoap.php'); 
  $server = new nusoap_server();

  $namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $server->configureWSDL('Petshop');

function get_makanan($Hewan) {
    if ($Hewan == "Kucing"){
        return "Merk Makanan yang tersedia untuk kucing adalah Royal Canin, Whiskas, dan Proplan ";
    } 
    elseif ($Hewan == "Anjing"){
        return "Merk Makanan yang tersedia untuk anjing adalah Proplan dan Alpo";
    }
    else {
        return "Mohon Maaf makanan untuk hewan ini tidak tersedia :(";
    }
}

function hitung_harga($Harga){
  if ($Harga >= "350.000"){
      return "Untuk Harga itu terdapat Variasi Makanan Kering dan Basah untuk Kucing dan Anjing Mulai dari Royal Canin, Proplan, Pedigree dan Aplo";
  }
  elseif ($Harga <= "30.000"){
      return "Untuk Harga itu hanya terdapat Cemilan saja";
  }
  else {
      return "Mohon Maaf tidak ada makanan untuk harga itu :(";
  }
}

function input_barang($Merk_makanan, $Hewan, $Harga, $Rasa, $Kategori){
  global $dbconn;
  $sql_insert = "insert into books (Merk_makanan, Hewan, Harga, Rasa, Kategori) values ( :Merk_makanan, :Hewan, :Harga, :Rasa, :Kategori)";
  $stmt = $dbconn->prepare($sql_insert);
}

$server->register('get_makanan',
    array('hewan' => 'xsd:string',)
);

$server->register('hitung_harga',
    array('harga' => 'xsd:string')
);

$server->register('input_barang',
    array('Merk_makanan' => 'xsd:string', 'Hewan' => 'xsd:string', 'Harga' => 'xsd:string', 'Rasa' => 'xsd:string', 'Kategori' => 'xsd:string'),
);

$server->service(file_get_contents("php://input"));
exit();



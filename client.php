<?php
 
require 'vendor/autoload.php';
require 'vendor/econea/nusoap/src/nusoap.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_message', array(
    'name' => 'di Petshop Jaya Raya<br>'
));
echo $response;

$response = $client->call('merk_anjing', array(
    'merek_1' => 'Proplan, Pedigree, Alpo'
));
echo $response;

$response = $client->call('merk_kucing', array(
    'merek_2' => 'Royal Canin, Whiskas, Markotop'
));
echo $response;

// Inisiasi variabel 
$harga_awal_kucing = 250000;
$harga_awal_anjing = 350000;
$besar_diskon = 0.15; //Diskon 15%
$promo = 100000;


echo "<p>Berikut Diskon Dari Makanan Kucing dan Anjing :</p>";

// Diskon Makanan Kucing
$tampil1 = $client->call('makanan_kucing', array('x' => $harga_awal_kucing, 'y' => $besar_diskon));
 
echo "<p>Hasil Diskon Makanan Kucing ".$harga_awal_kucing." setelah didiskon sebesar ".$besar_diskon." adalah ".$tampil1."</p>";

// Diskon Makanan Anjing
$tampil2 = $client->call('makanan_anjing', array('x' => $harga_awal_anjing, 'y' => $besar_diskon));
 
echo "<p>Hasil Diskon Makanan Anjing ".$harga_awal_anjing." setelah didiskon sebesar ".$besar_diskon." adalah ".$tampil2."</p>";

//Promo Bundling
$tampil3 = $client->call('promo', array('x' => $harga_awal_kucing, 'y' => $promo));
 
echo "<p>Promo Bundling Untuk 2 Makanan Kucing adalah ".$tampil3."</p>";
?>

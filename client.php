<?php
 require_once('dbconn.php');
 require_once('lib/nusoap.php'); 

 $namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
 $namespace = str_replace('client.php','server.php', $namespace);
 $client = new nusoap_client($namespace);

echo '<br>';

$response = $client->call('get_makanan', array(
    'Hewan' => 'Kucing'

));
echo $response;

echo '<br>';

$response = $client->call('hitung_harga', array(
    'Harga' =>  350000
));
echo $response;

echo '<br>';

$response = $client->call('input_barang', array(
    
));
echo $response;
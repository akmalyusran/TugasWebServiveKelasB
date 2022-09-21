<?php

require 'vendor/autoload.php';
require_once('vendor/econea/nusoap/src/nusoap.php');
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Petshop');
$server->wsdl->schemaTargetNamespace = $namespace;

$server->register('merk_anjing',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Nama-nama merek Makanan Anjing'
);

$server->register('merk_kucing',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Nama-nama merk Makanan Kucing'
);

$server->register('makanan_kucing',
    array('name' => 'xsd:float'),
    array('return' => 'xsd:float'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Deskripsi Produk Makanan Kucing'
);

$server->register('makanan_anjing',
    array('name' => 'xsd:float'),
    array('return' => 'xsd:float'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Deskripsi Produk Makanan Anjing'
);

$server->register('promo',
    array('name' => 'xsd:float'),
    array('return' => 'xsd:float'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Promo Bundling Makanan'
);

$server->register('get_message',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Selamat Datang di Petshop Kami'
);

// Membuat method operasi matematika dasar
function merk_anjing($merek_1) {
    return "Merk Makanan yang tersedia untuk anjing adalah $merek_1<br>";
}

function merk_kucing($merek_2) {
    return "Merk Makanan yang tersedia untuk kucing adalah $merek_2<br>";
}

function makanan_kucing($x, $y) {
    return $x - ($x * $y) ;
}

function makanan_anjing($x, $y) {
    return $x - ($x * $y) ;
}

function promo($x, $y) {
    return $x * 3 - $y ;
}

// Membuat method welcome message
function get_message($name) {
    return "Selamat datang $name";
}

$server->service(file_get_contents("php://input"));
exit();
?>
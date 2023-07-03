<?php
require __DIR__ . '\..\..\..\vendor\autoload.php';

use GuzzleHttp\Client;

$module =$_GET['module'];
$action = $_GET['act'];
// $id = $_GET['id'];

// $id = $_POST['id'];
//$nama = $_POST['nama'];

if ($action=='hapus') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:5000',
            'timeout' => 5
        ]);
        $response =  $client->request('DELETE', '/api/list/' . $id , [
            'json' => []
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=pesawat');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif ($action=='insert') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:5000',
            'timeout' => 5
        ]);
        $response =  $client->request('POST', '/api/list/', [
            'json' => [
                'nama_pesawat' => $_POST['nama_pesawat'],
                'kelas' => $_POST['kelas']
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=pesawat');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}elseif ($action=='update') {
    try {
        $client = new Client([
            'base_uri' => 'http://127.0.0.1:5000',
            'timeout' => 5
        ]);
        $response =  $client->request('PUT', '/api/list/' . $_POST['id'] , [
            'json' => [
                'nama_pesawat' => $_POST['nama_pesawat'],
                'kelas' => $_POST['kelas']
            ]
        ]);

        $body = $response->getBody();
        // $data_body = json_decode($body, true);

        header('location:..\..\dashboard_user.php?module=pesawat');
    } catch (RuntimeException $e) {
        echo $e->getMessage();
    }
}
?>
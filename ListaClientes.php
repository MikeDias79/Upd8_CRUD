<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$host   = '127.0.0.1';
$db     = 'testeupd8';
$user   = 'upd8';
$pass   = 'upd8*';

$nome = "";
$cpf = "";
$estado = "";

if (!empty($_REQUEST)) {

    $nome   = $_REQUEST['nome'];
    $cpf    = $_REQUEST['cpf'];
    $estado = $_REQUEST['estado'];

}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Erro interno do servidor
    echo json_encode(['message' => 'Erro ao conectar ao banco de dados']);
    exit;
}

$sql = "SELECT * FROM clientes where id is not null";
    if (trim($nome) != "") {
        $sql = $sql . " and nome like '%" . $nome . "%'";
    }

    if (trim($cpf) != "") {
        $sql = $sql . " and cpf like '%" . $cpf . "%'";
    }
    
    if (trim($estado) != "") {
        $sql = $sql . " and estado = '" . $estado . "'";
    }    

    $stmt = $pdo->query($sql);

    $clientes = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $clientes[] = $row;
    }

    echo json_encode($clientes);

?>
<?php

$host   = '127.0.0.1';
$db     = 'testeupd8';
$user   = 'upd8';
$pass   = 'upd8*';

$nome = "";
$cpf = "";
$estado = "";

if (!empty($_REQUEST)) {

    $estado = $_REQUEST['uf'];

}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500); // Erro interno do servidor
    echo json_encode(['message' => 'Erro ao conectar ao banco de dados']);
    exit;
}

$sql = "
SELECT rep.nome AS nome FROM representantes rep
INNER JOIN uf_rep uf ON rep.id = uf.id";

    if (trim($estado) != "") {
        $sql = $sql . " and uf.uf = '" . $estado . "'";
    }    

    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nome'] . "<br>";
    }


?>
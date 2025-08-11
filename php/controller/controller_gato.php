<?php
require '../config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $acao = $_POST['acao'] ?? null;

    if ($acao === 'salvar'){
        $nome = $_POST['nome'] ?? null;
        $raca = $_POST['raca'] ?? null;
        $sexo = $_POST['sexo'] ?? null;
        $nascimento = $_POST['nascimento'] ?? null;
        $castracao = $_POST['castracao'] ?? false;
        $adocao = $_POST['adocao'] ?? false;

        $result = $collection->insertOne([
            'nome' => $nome,
            'raca' => $raca,
            'sexo' => $sexo,
            'nascimento' => $nascimento,
            'castracao' => $castracao,
            'adocao' => $adocao
        ]);
    } elseif ($acao === 'editar') {
        $nome = $_POST['nome'] ?? null;
        $raca = $_POST['raca'] ?? null;
        $sexo = $_POST['sexo'] ?? null;
        $nascimento = $_POST['nascimento'] ?? null;
        $castracao = $_POST['castracao'] ?? null;
        $adocao = $_POST['adocao'] ?? null;

        $result = $collection->updateOne(
            ['nome' => $nome],
            ['$set' => [
                'nome' => $nome,
                'raca' => $raca,
                'sexo' => $sexo,
                'nascimento' => $nascimento,
                'castracao' => $castracao,
                'adocao' => $adocao
            ]]
        );
    } elseif ($acao === 'excluir') {
        $id = $_POST['id'] ?? null;
        $objectId = new MongoDB\BSON\ObjectId($id);

        $result = $collection->deleteOne(['_id' => $objectId]);
    }
}

header("Location: ../view/principal.php");
exit;



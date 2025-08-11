<?php

require 'vendor/autoload.php'; 

try {
    // 1. Conexão ao MongoDB
    $client = new MongoDB\Client("mongodb://mongo_gateiro:27017");

    // 2. Selecionar o banco de dados e a coleção
    $db = $client->selectDatabase('gateiro');
    $collection = $db->selectCollection('gato');

} catch (Exception $e) {
    echo "Erro na conexão ou na operação: " . $e->getMessage();
}

?>
<?php
require '../vendor/autoload.php';
require '../config.php';


if(!isset($_GET['id'])) {
    die('id não informado');
}

$id = $_GET['id'];

$objectId = new MongoDB\BSON\ObjectId($id);

$gato = $collection->findOne(['_id' => $objectId]);

if (!$gato) {
    die('Gato não encontrado');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Gato</title>
</head>
<body>
    <form action="../controller/controller_gato.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $objectId?>" >
        <input type="text" name="nome" id="nome" placeholder="nome" value="<?php echo htmlspecialchars($gato['nome'] ?? ''); ?>">
        <input type="text" name="raca" id="raca" placeholder="raca" value="<?php echo htmlspecialchars($gato['raca'] ?? ''); ?>">
        <input type="text" name="sexo" id="sexo" placeholder="sexo" value="<?php echo htmlspecialchars($gato['sexo'] ?? ''); ?>">
        <input type="date" name="nascimento" id="nascimento" placeholder="nascimento" value="<?php echo htmlspecialchars($gato['nascimento'] ?? ''); ?>">
        
        <label for="castracao">Castrado(a)?</label>
        <input type="checkbox" name="castracao" id="castracao" value="true" <?php if (!empty($gato['castracao'])) echo 'checked'; ?>>

        <label for="adocao">Adotado(a)?</label>
        <input type="checkbox" name="adocao" id="adocao" value="true" <?php if (!empty($gato['adocao'])) echo 'checked'; ?>>

        <button type="submit" name="acao" value="editar">Editar</button>
        <button type="submit" name="acao" value="excluir">Excluir</button>
    </form>
</body>
</html>
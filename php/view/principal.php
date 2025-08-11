<?php
require '../vendor/autoload.php';
require '../config.php';

$gatos = $collection->find();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Lista de Gatos</title>
</head>
<body>
  <h1>Gatos para Adoção</h1>

  <ul>
    <?php foreach ($gatos as $gato): ?>
      <li>
        <a href="edit.php?id=<?php echo $gato['_id']; ?>">
          <?php echo htmlspecialchars($gato['nome'] ?? 'Sem nome'); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <a href="cad.php">Cadastrar Novo</a>
</body>
</html>
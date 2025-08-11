<?php
require '../vendor/autoload.php';
require '../config.php';

$gatos = $collection->find();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gatinhos Cósmicos</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
  </style>
</head>
<body class="bg-slate-950 text-slate-100 flex flex-col items-center justify-center min-h-screen p-4 font-['Orbitron']">
  
  <div class="w-full max-w-2xl bg-slate-900 border border-purple-500 rounded-2xl shadow-2xl shadow-purple-500/50 p-8 md:p-12 text-center transform transition-transform duration-500">
    <h1 class="text-3xl md:text-5xl font-bold text-purple-400 mb-8 tracking-widest leading-tight">
        Gatos para Adoção
    </h1>

    <ul class="space-y-4 mb-8">
      <?php foreach ($gatos as $gato): ?>
        <li class="p-4 bg-slate-800 border-l-4 border-pink-400 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105 hover:bg-slate-700">
          <a href="edit.php?id=<?php echo $gato['_id']; ?>" class="text-sky-300 text-lg md:text-xl hover:text-sky-100 transition-colors duration-300">
            <?php echo htmlspecialchars($gato['nome'] ?? 'Gato sem Nome Cósmico'); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <a href="cad.php" class="inline-block px-8 py-3 text-lg font-bold text-purple-950 bg-sky-400 rounded-full shadow-lg shadow-sky-400/50 uppercase tracking-wide
        transition-all duration-300 ease-in-out
        hover:bg-sky-200 hover:text-purple-900 hover:shadow-sky-300/70
        transform hover:-translate-y-1">
      Cadastrar Novo Gato
    </a>
  </div>

</body>
</html>
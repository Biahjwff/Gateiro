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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gato Cósmico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
    </style>
</head>
<body class="bg-slate-950 text-slate-100 flex flex-col items-center justify-center min-h-screen p-4 font-['Orbitron']">

    <div class="w-full max-w-xl bg-slate-900 border border-purple-500 rounded-2xl shadow-2xl shadow-purple-500/50 p-8 md:p-12 transform transition-transform duration-500">
        <h1 class="text-3xl md:text-4xl font-bold text-purple-400 mb-8 text-center tracking-widest leading-tight">
            Editar Gato
        </h1>

        <form action="../controller/controller_gato.php" method="post" class="space-y-6">
            <input type="hidden" name="id" id="id" value="<?php echo $objectId?>">

            <div>
                <input type="text" name="nome" id="nome" placeholder="Nome Cósmico"
                    class="w-full px-4 py-3 bg-slate-800 text-sky-300 border border-purple-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 placeholder-purple-400 transition-colors duration-300"
                    value="<?php echo htmlspecialchars($gato['nome'] ?? ''); ?>">
            </div>

            <div>
                <input type="text" name="raca" id="raca" placeholder="Raça Estelar"
                    class="w-full px-4 py-3 bg-slate-800 text-sky-300 border border-purple-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 placeholder-purple-400 transition-colors duration-300"
                    value="<?php echo htmlspecialchars($gato['raca'] ?? ''); ?>">
            </div>

            <div>
                <input type="text" name="sexo" id="sexo" placeholder="Sexo Robótico"
                    class="w-full px-4 py-3 bg-slate-800 text-sky-300 border border-purple-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 placeholder-purple-400 transition-colors duration-300"
                    value="<?php echo htmlspecialchars($gato['sexo'] ?? ''); ?>">
            </div>
            
            <div>
                <input type="date" name="nascimento" id="nascimento"
                    class="w-full px-4 py-3 bg-slate-800 text-sky-300 border border-purple-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-400 transition-colors duration-300"
                    value="<?php echo htmlspecialchars($gato['nascimento'] ?? ''); ?>">
            </div>

            <div class="flex items-center space-x-4">
                <input type="checkbox" name="castracao" id="castracao" value="true"
                    class="w-5 h-5 text-sky-400 bg-slate-800 border-purple-600 rounded focus:ring-sky-400 transition-colors duration-300"
                    <?php if (!empty($gato['castracao'])) echo 'checked'; ?>>
                <label for="castracao" class="text-sky-300 text-lg">Castrado(a)?</label>
            </div>

            <div class="flex items-center space-x-4">
                <input type="checkbox" name="adocao" id="adocao" value="true"
                    class="w-5 h-5 text-sky-400 bg-slate-800 border-purple-600 rounded focus:ring-sky-400 transition-colors duration-300"
                    <?php if (!empty($gato['adocao'])) echo 'checked'; ?>>
                <label for="adocao" class="text-sky-300 text-lg">Adotado(a)?</label>
            </div>

            <div class="flex justify-between space-x-4 mt-8">
                <button type="submit" name="acao" value="editar"
                    class="w-1/2 px-4 py-3 text-lg font-bold text-purple-950 bg-sky-400 rounded-full shadow-lg shadow-sky-400/50 uppercase tracking-wide
                    transition-all duration-300 ease-in-out
                    hover:bg-sky-200 hover:text-purple-900 hover:shadow-sky-300/70
                    transform hover:-translate-y-1">
                    Editar
                </button>

                <button type="submit" name="acao" value="excluir"
                    class="w-1/2 px-4 py-3 text-lg font-bold text-purple-950 bg-pink-500 rounded-full shadow-lg shadow-pink-500/50 uppercase tracking-wide
                    transition-all duration-300 ease-in-out
                    hover:bg-pink-300 hover:text-purple-900 hover:shadow-pink-400/70
                    transform hover:-translate-y-1"
                    onclick="return confirm('Tem certeza que deseja excluir este gato? Essa ação não pode ser desfeita.');">
                    Excluir
                </button>
            </div>
        </form>
    </div>

</body>
</html>
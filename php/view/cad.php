<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Gato</title>
</head>
<body>
    <form action="../controller/controller_gato.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="nome">
        <input type="text" name="raca" id="raca" placeholder="raca">
        <input type="text" name="sexo" id="sexo" placeholder="sexo">
        <input type="date" name="nascimento" id="nascimento" placeholder="nascimento">
        <label for="castracao">Castrado(a)?</label>
        <input type="checkbox" name="castracao" id="castracao" value="true">

        <label for="adocao">Adotado(a)?</label>
        <input type="checkbox" name="adocao" id="adocao" value="true">

        <button type="submit" name="acao" value="salvar">Cadastrar</button>
    </form>
</body>
</html>
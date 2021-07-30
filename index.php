<?php

    include_once('viacep.php');
    $endereco = pegarEndereco();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Consumo de API VIA-CEP</title>
</head>
<body>
    <form action="." method="POST">
    <p>Digte o CEP da cidade que você deseja.</p>
    <input type="text" placeholder="Digite o CEP aqui..." name="cep" value="<?php echo $endereco->cep ?>">
    <input type="submit">
    <input type="text" placeholder="Rua" name="rua" value="<?php echo $endereco->logradouro ?>">
    <input type="text" placeholder="Bairro" name="bairro" value="<?php echo $endereco->bairro ?>">
    <input type="text" placeholder="Cidade" name="cidade" value="<?php echo $endereco->localidade ?>">
    <input type="text" placeholder="Estado" name="estado" value="<?php echo $endereco->uf ?>">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style-home.css">
    <title>Recuperação de conta</title>
</head>
<body class="default">
    <div class="formResetSenha">
        <h3>Recuperação de conta</h3>
        <br/>
        <input type="text" name="txtEmail" id="txtEmail" placeholder="Informe seu email"/>
        <br/>
        <button onclick="validar_recuperacao()">Enviar</button>
        <br/>
        <span>Criar uma nova conta:</span>
        <a href="../views/novoUsuario.php" id="criarConta">Cadastrar</a>
        <br/><br/><br/>
        <a href="../index.php">Retornar à página inicial</a>
    </div>
</body>
</html>
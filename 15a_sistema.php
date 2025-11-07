<?php
// Página de login
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Compara os dados (Verifica se são válidos)
    if($usuario == 'Max Verstappen' && $senha =='123') {
        // Se sim (Salva o nome do usuário)
        $_SESSION['usuario'] = $usuario;

        // Redirecionar para a página (restrita)
        header("location: 15b_restrita.php");
        exit();
    } else {
        // Senão (Informa o problema)
        $erro = "Usuário ou senha incorretos!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method='post'>
        <label for="usuario">Usuário</label>
        <input type="text" name='usuario' required>

        <label for="senha">Senha</label>
        <input type="password" name='senha' required>

        <button type='submit'>Entrar</button>

    </form>
    <!-- Mensagem de erro -->
    <?php
        if(isset($erro)) {
            echo "<p style='color: red;'>$erro</p>";
        }
    ?>
</body>
</html>
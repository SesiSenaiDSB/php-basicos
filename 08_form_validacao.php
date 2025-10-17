<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de feedback</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required> <br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required> <br>
        
        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" required> </textarea> <br>

        <button type="submit">Enviar</button>

    </form>

    <?php
        // Verificar se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] =='POST') {
            // Recebe os valores enviados pelo formulario
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];

            // Valida se os campos nãpo estão vazios
            if (!empty($mensagem)) {
                echo "<p style='color: Darkgreen;'>Feedback enviado com sucesso!</p> ";
            } else {
                echo "<p style='color: Red;'>Preencha todos os campos corretamente.</p>";
            }; 
        }
    ?>

</body>
</html>
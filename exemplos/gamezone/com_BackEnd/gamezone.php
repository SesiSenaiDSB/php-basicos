<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "gamezone";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Busca os dados da tabela de consoles
$sql_consoles = "SELECT nome FROM consoles";
$result_consoles = $conn->query($sql_consoles);

$consoles = [];
if ($result_consoles->num_rows > 0) {
    while($row = $result_consoles->fetch_assoc()) {
        $consoles[] = $row;
    }
}

// Busca os dados da tabela de jogos, incluindo o nome do console
$sql_jogos = "SELECT j.nome AS nome_jogo, c.nome AS nome_console, j.preco 
              FROM jogos j
              JOIN consoles c ON j.console_id = c.id";
$result_jogos = $conn->query($sql_jogos);

$jogos = [];
if ($result_jogos->num_rows > 0) {
    while($row = $result_jogos->fetch_assoc()) {
        $jogos[] = $row;
    }
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>GameZone Retro - Jogos Clássicos</title>
    <link rel="stylesheet" href="gameZone.css">
</head>
<body>
    <h1 class="titulo-principal">🎮 GameZone Retro</h1>
    <p class="subtitulo">A <strong>melhor loja</strong> de <em>jogos clássicos</em> da cidade!</p>
    
    <nav class="navegacao">
        <a href="#precos">Ver Preços</a>
        <a href="https://instagram.com/gamezone" target="_blank">Instagram</a>
    </nav>

    <img src="assets/retro.jpg" alt="Jogos Retro" class="banner-principal">

    <h2 class="titulo-secao">🕹️ Consoles Disponíveis</h2>
    <ul class="lista-consoles">
        <?php foreach ($consoles as $console): ?>
        <li><?php echo htmlspecialchars($console['nome']); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2 id="precos" class="titulo-secao">💰 Preços</h2>
    <table class="tabela-precos">
        <tr>
            <th>Jogo</th>
            <th>Console</th>
            <th>Preço</th>
        </tr>
        <?php foreach ($jogos as $jogo): ?>
        <tr>
            <td><?php echo htmlspecialchars($jogo['nome_jogo']); ?></td>
            <td><?php echo htmlspecialchars($jogo['nome_console']); ?></td>
            <td class="preco">R$ <?php echo number_format($jogo['preco'], 2, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p class="rodape">&copy; 2025 GameZone Retro</p>
</body>
</html>
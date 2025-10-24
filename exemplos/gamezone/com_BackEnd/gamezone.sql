-- Tabela para os consoles
CREATE TABLE consoles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Insere dados na tabela de consoles
INSERT INTO consoles (nome) VALUES
('Nintendo (NES)'),
('Super Nintendo (SNES)'),
('Sega Genesis'),
('Atari 2600');

-- Tabela para os jogos
CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    console_id INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (console_id) REFERENCES consoles(id)
);

-- Insere dados na tabela de jogos
INSERT INTO jogos (nome, console_id, preco) VALUES
('Super Mario Bros', 1, 85.00),
('Sonic', 3, 70.00),
('Zelda', 1, 120.00);
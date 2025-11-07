<?php

// Página de logout 
session_start();

// Finaliza a sessão
session_destroy();

header("Location: 15a_sistema.php")

?>
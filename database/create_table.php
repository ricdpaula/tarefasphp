<?php

$caminhoAbsoluto = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:'. $caminhoAbsoluto);

$sql = "CREATE TABLE tarefas (
    id integer PRIMARY KEY,
    nome varchar(150) NOT NULL,
    descricao varchar(255) NOT NULL,
    modelo varchar(12) NOT NULL
)";

$statement = $pdo->prepare($sql);
$statement->execute();
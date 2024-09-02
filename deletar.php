<?php

require 'vendor/autoload.php';
require 'database/conexao.php';
use Rpfront\Tarefasphp\Repository\TarefaRepositorio;

$tarefaRepositorio = new TarefaRepositorio($pdo);

if (isset($_GET['id'])) {
    $tarefaRepositorio->delete($_GET['id']);
}else{
    header('location: /');
}
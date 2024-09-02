<?php

require 'vendor/autoload.php';
require 'database/conexao.php';
use Rpfront\Tarefasphp\Repository\TarefaRepositorio;

$tarefaRepositorio = new TarefaRepositorio($pdo);
$tarefas = $tarefaRepositorio->all();

?>

<div class="d-flex justify-content-center my-5 flex-wrap">
<i style="display:<?= count($tarefas) == 0 ? '' : 'none' ?>;">Não tem nenhuma tarefa para hoje :)</i>
<?php foreach ($tarefas as $tarefa): ?>
<div class="card m-2 <?= $tarefa->getModelo() ?>" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $tarefa->getNome() ?></h5>
    <p class="card-text"><?= $tarefa->getDescricao() ?></p>
    <a href="/editar.php?id=<?= $tarefa->getId() ?>" class="card-link btn btn-dark">Editar</a>
    <a href="/deletar.php?id=<?= $tarefa->getId() ?>" class="card-link text-light m-0">Excluir</a>
  </div>
</div>
<?php endforeach; ?>
</div>
<?php

require 'vendor/autoload.php';
require 'database/conexao.php';
use Rpfront\Tarefasphp\Repository\TarefaRepositorio;
use Rpfront\Tarefasphp\Model\Tarefa;

$tarefaRepositorio = new TarefaRepositorio($pdo);

if (isset($_GET['id'])) {
    $tarefa = $tarefaRepositorio->one($_GET['id']);
}

if (isset($_POST['nome'])) {

    $tarefaEditar = new Tarefa(
        $_POST['id'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['modelo'],
    );

    $tarefaRepositorio->edit($tarefaEditar);
}

?>

<?php require_once 'src/Components/comeco-html.php' ?>
<?php require_once 'src/Components/nav.php' ?>
<main>
    <section class="container w-50">
        <form method="POST" class="form-group my-5">
            <input type="hidden" name="id" value="<?= $tarefa->getId() ?>">
            <label for="nome" class="form-label text-light">Nome da tarefa:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $tarefa->getNome() ?>" required><br>
            <label for="descricao" class="form-label text-light">Descricao:</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="8" required><?= $tarefa->getDescricao() ?></textarea><br>

            <div class="d-flex flex-wrap">
                <div class="">
                    <div class="card m-2 modelo1" style="width: 18rem;">
                        <div class="card-body">
                            <input type="radio" name="modelo" value="modelo1" id="modelo1" <?= $tarefa->getModelo() == 'modelo1' ? 'checked' : '' ?> required>
                            <label for="modelo1" class="form-label">Modelo 1</label>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="card m-2 modelo2" style="width: 18rem;">
                        <div class="card-body">
                            <input type="radio" name="modelo" value="modelo2" id="modelo2" <?= $tarefa->getModelo() == 'modelo2' ? 'checked' : '' ?> required>
                            <label for="modelo2" class="form-label">Modelo 2</label>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="card m-2 modelo3" style="width: 18rem;">
                        <div class="card-body">
                            <input type="radio" name="modelo" value="modelo3" id="modelo3" <?= $tarefa->getModelo() == 'modelo3' ? 'checked' : '' ?> required>
                            <label for="modelo3" class="form-label">Modelo 3</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center mt-5">
                <button type="submit" class="btn btn-dark">Criar tarefa</button>
            </div>
        </form>
    </section>
</main>
<?php require_once 'src/Components/fim-html.php' ?>
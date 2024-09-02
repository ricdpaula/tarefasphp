<?php

require 'vendor/autoload.php';
require 'database/conexao.php';

?> 

<?php require_once 'src/Components/comeco-html.php' ?>
<?php require_once 'src/Components/nav.php' ?>
<main>
    <section class="container">
        <?php require_once 'src/Components/card.php' ?>
    </section>
    <section class="container text-center">
        <a href="/criar.php" class="btn btn-dark">Adicionar uma nova tarefa</a>
    </section>
</main>
<?php require_once 'src/Components/fim-html.php' ?>
    


<?php

namespace Rpfront\Tarefasphp\Repository;
use Rpfront\Tarefasphp\Model\Tarefa;
use PDO;

class TarefaRepositorio {
    private PDO $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function create(Tarefa $tarefa): void{
        $sql = "INSERT INTO tarefas (nome, descricao, modelo) VALUES (?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tarefa->getNome());
        $statement->bindValue(2, $tarefa->getDescricao());
        $statement->bindValue(3, $tarefa->getModelo());

        if ($statement->execute()) {
            header('location: /');
        }else{
            echo 'Ocorreu um erro';
        }
    }
    public function all(): array{
        $sql = "SELECT * FROM tarefas ORDER BY nome";
        $statement = $this->pdo->query($sql);
        $dadosDB = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $tarefas = array_map(function ($tarefa) {
            return new Tarefa(
                $tarefa['id'],
                $tarefa['nome'],
                $tarefa['descricao'],
                $tarefa['modelo'],
            );
        }, $dadosDB);

        return $tarefas;
    }
    public function one(int $id): Tarefa{
        $sql = "SELECT * FROM tarefas WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        $dadoDB = $statement->fetch(PDO::FETCH_ASSOC);

        $tarefa = new Tarefa(
                $dadoDB['id'],
                $dadoDB['nome'],
                $dadoDB['descricao'],
                $dadoDB['modelo']
            );

        return $tarefa;
    }
    
    public function delete(int $id): void{
        $sql = "DELETE FROM tarefas WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        
        if ($statement->execute()) {
            header('location: /index.php');
        }else{
            echo 'Ocorreu um erro';
        }
    }

    public function edit(Tarefa $tarefa): void {
        $sql = "UPDATE tarefas SET nome = ?, descricao = ?, modelo = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $tarefa->getNome());
        $statement->bindValue(2, $tarefa->getDescricao());
        $statement->bindValue(3, $tarefa->getModelo());
        $statement->bindValue(4, $tarefa->getId());
        
        if ($statement->execute()) {
            header('location: /');
        }else{
            echo 'Ocorreu um erro';
        }
    }
}
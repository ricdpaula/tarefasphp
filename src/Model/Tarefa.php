<?php

namespace Rpfront\Tarefasphp\Model;

class Tarefa {
    private ?int $id;
    private string $nome;
    private string $descricao;
    private string $modelo;
    public function __construct(
        ?int $id,
        string $nome,
        string $descricao,
        string $modelo
    ){
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->modelo = $modelo;
    }
    public function getId(): int{
        return $this->id;
    }
    public function getNome(): string{
        return $this->nome;
    }
    public function getDescricao(): string{
        return $this->descricao;
    }
    public function getModelo(): string{
        return $this->modelo;
    }
}
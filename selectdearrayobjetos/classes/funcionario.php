<?php

class Funcionario{
    
    private $nome;
    private $apelido;
    
    function __construct()
    {

    }    
    
    function getNome() {
        return $this->nome;
    }

    function getApelido() {
        return $this->apelido;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

} 



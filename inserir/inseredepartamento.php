<?php

/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'T_id');
    $nome = filter_input(INPUT_POST, 'T_nome');

    /* validar os dados recebidos do formulario */
    if (empty($id) || empty($nome)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
   echo " Erro, formulário não submetido ";
   exit();
}


/* estabelece a ligação à base de dados */
$ligacao = new mysqli("localhost", "root", "1234", "empresa");

/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error; 
    exit();
}
    
/* texto sql da consulta*/
$consulta = "INSERT INTO departamento (id, nome) VALUES ('$id', '$nome' )";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo " Novo registo inserido com sucesso" ;
    }

$ligacao->close();       /* fechar a ligação */

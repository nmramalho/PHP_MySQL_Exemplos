<?php

/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'T_id');
    $novoid = filter_input(INPUT_POST, 'T_novoid');
    $nome = filter_input(INPUT_POST, 'T_nome');

    /* validar os dados recebidos do formulario */
    if (empty($id) || empty($nome) || empty($novoid)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
   echo " ERRO - Não foi possível executar a operação editar. ";
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
$consulta = "UPDATE departamento SET id='$novoid', nome='$nome' WHERE id='$id' ";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " ERRO - Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo " SUCESSO - O registo foi editado com sucesso" ;
}

$ligacao->close();       /* fechar a ligação */
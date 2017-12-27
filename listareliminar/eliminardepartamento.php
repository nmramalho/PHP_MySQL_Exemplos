<?php

/* Verificar se foi enviado o pedido para eliminar  */
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = filter_input(INPUT_GET, 'id');
    $operacao = filter_input(INPUT_GET, 'operacao');

    /* validar os dados recebidos através do pedido */
    if (empty($id) || $operacao!="eliminar"){
        echo "  Erro, pedido inválido ";
        exit();
    }    
}
else{
   echo " Erro, pedido inválido ";
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
$consulta = "DELETE FROM departamento WHERE id = '$id' ";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
    echo ' <br> <a href="listardepartamentos.php"> Voltar à lista de departamentos </a>' ;
    exit();
}

/* verificar o resultado da consulta */
if($ligacao->affected_rows > 0){
    echo " O registo com o id = $id foi eliminado com sucesso" ;
    $ligacao->close();       /* fechar a ligação */
    echo '<br> <a href="listardepartamentos.php"> Voltar à lista de departamentos </a>' ;
}
else{
    header("Location: listardepartamentos.php");
    echo " O registo com o id = $id não encontrado!" ;
    $ligacao->close();       /* fechar a ligação */
    echo '<br> <a href="listardepartamentos.php"> Voltar à lista de departamentos </a>' ;
}




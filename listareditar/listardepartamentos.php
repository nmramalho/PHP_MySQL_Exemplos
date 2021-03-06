<?php

/* estabelece a ligação à base de dados */
$ligacao = new mysqli("localhost", "root", "1234", "empresa");

/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error; 
    exit();
}

/* definir o charset utilizado na ligação */
$ligacao->set_charset("utf8");
    
/* texto sql da consulta*/
$consulta = 'SELECT * FROM departamento';

/* executar a consulta e testar se ocorreu erro */
if (!$resultado = $ligacao->query($consulta)) {
    echo ' Falha na consulta: '. $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    while ($row = $resultado->fetch_assoc()){   
        echo 'id: ' . $row['id'] . ' Nome: ' . $row['nome'] . 
             '<a href="formeditardepartamento.php?id='.$row['id'] .
             '&operacao=editar"> - Editar </a><br>';
    }

$resultado->free();      /* libertar o resultado */
$ligacao->close();       /* fechar a ligação */

}


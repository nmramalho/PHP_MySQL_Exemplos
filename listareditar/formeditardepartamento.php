<html>
    <head>
        <title>Editar Departamento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
    <?php

        /* Verificar se foi enviado o pedido para eliminar  */
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = filter_input(INPUT_GET, 'id');
        $operacao = filter_input(INPUT_GET, 'operacao');

        /* validar os dados recebidos através do pedido */
        if (empty($id) || $operacao!="editar"){
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

    /* definir o charset utilizado na ligação */
    $ligacao->set_charset("utf8");

    /* texto sql da consulta*/
    $consulta = "SELECT * FROM departamento  WHERE id = '$id' ";

    /* executar a consulta e testar se ocorreu erro */
    if (!$resultado = $ligacao->query($consulta)) {
        echo ' Falha na consulta: '. $ligacao->error;
        $ligacao->close();  /* fechar a ligação */
    }
    else{
        /* obter os dados do registo */
        $row = $resultado->fetch_assoc();
        ?>
        
        <form method="POST" action="editardepartamento.php">
            Id: <br> 
            <input type="text" name="T_id" value="<?=$row['id']?>" readonly> <br>
            Novo id: <br> 
            <input type="text" name="T_novoid" value="<?=$row['id']?>"><br>
            Nome:<br>
            <input type="text" name="T_nome" value="<?=$row['nome']?>"><br>
            <input type="submit" value="Editar" >
        </form>

    <?php
    $resultado->free();      /* libertar o resultado */
    $ligacao->close();       /* fechar a ligação */
    }
 ?>
        
    </body>
</html>










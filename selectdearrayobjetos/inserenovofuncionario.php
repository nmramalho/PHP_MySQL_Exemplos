<?php

include_once 'classes/componente.php';
include_once 'classes/funcionario.php';

$componente = new Componente();
$funcionario = new Funcionario();

$componente->Cabecalho('Exemplo - formulário com select preenchido através de um array de objetos');

/* recebe os dados do formulário e coloca no objeto Funcionario*/

$funcionario->setNome(filter_input(INPUT_POST, 'nome'));
$funcionario->setApelido(filter_input(INPUT_POST, 'apelido'));

/* recebe o id do departamento proveniente do elemento select */
$idDepartamento = filter_input(INPUT_POST, 'departamento');

/* Mostra os dados */
echo "<br><br>Nome: " . $funcionario->getNome() . "<br>";
echo "Apelido: " . $funcionario->getApelido() . "<br>";

echo "Id Departamento: " . $idDepartamento . "<br><br>";

$componente->Rodape('By Nuno Ramalho - 550nmr.com');
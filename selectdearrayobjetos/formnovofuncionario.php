<?php

include_once 'classes/componente.php';
include_once 'classes/operacoesbd.php';

$componente = new Componente();

$componente->Cabecalho('Exemplo - formulário com select preenchido através de um array de objetos');

$componente->mostraFormNovoFuncionario();

$componente->Rodape('By Nuno Ramalho - 550nmr.com');

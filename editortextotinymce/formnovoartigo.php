<?php

include_once 'classes/componente.php';

$componente = new Componente();

$componente->CabecalhoComTinyMCE('Exemplo - Utilização do editor TinyMCE para processar/editar texto');

$componente->mostraFormNovoArtigo();

$componente->Rodape('By Nuno Ramalho - 550nmr.com');

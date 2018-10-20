<?php

include "../Classes/Conexao.class.php";
include "../Helpers/Padrao.class.php";

use Classes\Conexao;
use Helpers\Padrao;


$conn = new Conexao();


$comando1 = $conn->getAll("SELECT * FROM `tarefa_atribuicao` WHERE visualizado = 1", array());
$comando2 = $conn->getAll("SELECT * FROM `tarefa_atribuicao` WHERE visualizado = 0", array());


$resposta = array(
	"comando1" => $comando1,
	"comando2" => $comando2,
);


$resposta = array(
	"resultado" => $sql,
);

$helpers = new Padrao();
$helpers->retornarJson($resposta);

?>

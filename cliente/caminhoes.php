<?php

include "../Classes/Conexao.class.php";
include "../Helpers/Padrao.class.php";

use Classes\Conexao;
use Helpers\Padrao;


$empresa = ( isset($_GET['empresa']) ) ? $_GET['empresa'] : null;


$conn = new Conexao();

$sql = $conn->getAll("SELECT foto, marca, modelo, placa "
                        ."FROM `carro`"
                        ."WHERE empresa_codigo = ?", 
						array($empresa));

$resposta = array(
	"resultado" => $sql,
);

$helpers = new Padrao();
$helpers->retornarJson($resposta);

?>

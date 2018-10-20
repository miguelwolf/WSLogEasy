<?php

include "../Classes/Conexao.class.php";
include "../Helpers/Padrao.class.php";

use Classes\Conexao;
use Helpers\Padrao;


$empresa = ( isset($_GET['codigo']) ) ? $_GET['codigo'] : null;


$conn = new Conexao();

$sql = $conn->getAll("SELECT * "
                        ."FROM `pessoa`"
                        ."WHERE codigo = ?", 
						array($codigo));

$resposta = array(
	"resultado" => $sql,
);

$helpers = new Padrao();
$helpers->retornarJson($resposta);

?>

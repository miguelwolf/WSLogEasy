<?php

include "../Classes/Conexao.class.php";
include "../Helpers/Padrao.class.php";

use Classes\Conexao;
use Helpers\Padrao;


$empresa = ( isset($_GET['empresa']) ) ? $_GET['empresa'] : null;


$conn = new Conexao();

$sql = $conn->getAll("SELECT a.nome, a.foto, c.marca, c.modelo "
                        ."FROM `pessoa` a "
                            ."INNER JOIN `carro_pessoa` b on a.codigo = b.pessoa "
                            ."INNER JOIN `carro` c on b.carro = c.codigo "
                        ."WHERE a.empresa_codigo = ?", 
						array($empresa));

$resposta = array(
	"resultado" => $sql,
);

$helpers = new Padrao();
$helpers->retornarJson($resposta);

?>

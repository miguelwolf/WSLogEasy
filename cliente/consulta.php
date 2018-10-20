<?php

include "../Classes/Conexao.class.php";
include "../Helpers/Padrao.class.php";

use Classes\Conexao;
use Helpers\Padrao;


$nome = ( isset($_GET['nome']) ) ? $_GET['nome'] : null;
$cli = ( isset($_GET['cli']) ) ? $_GET['cli'] : null;
$cam = ( isset($_GET['cam']) ) ? $_GET['cam'] : null;
$adm = ( isset($_GET['adm']) ) ? $_GET['adm'] : null;
$emp = ( isset($_GET['emp']) ) ? $_GET['emp'] : null;


$conn = new Conexao();

$sql = $conn->getAll("SELECT a.*, b.* FROM `pessoa` a INNER JOIN `endereco` b on a.codigo = b.pessoa WHERE a.nome LIKE ? and a.tipo_pessoa in (?,?,?,?)", 
						array("%".$nome."%", $cli, $cam, $adm, $emp));

$resposta = array(
	"resultado" => $sql,
);

$helpers = new Padrao();
$helpers->retornarJson($resposta);

?>

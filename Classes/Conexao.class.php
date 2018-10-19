<?php

namespace Classes;

include "Config/ConfigGlobal.class.php";

use Config\ConfigGlobal;

class Conexao {
	
	const ERRO = "500";
	const SUCESSO = "0";
	const INFORMACAO = "1";
	
	public $pdo = null;
	
	public function __construct(){
		
		$config = new ConfigGlobal();
		
		if ( is_null($this->getPdo()) ){
			
			$driver = ConfigGlobal::DRIVER_DATABASE;
			$host = ConfigGlobal::HOST_DATABASE;
			$username = ConfigGlobal::USUARIO_DATABASE;
			$password = ConfigGlobal::SENHA_DATABASE;
			$bd = ConfigGlobal::NOME_DATABASE;
			
			try {
				$pdo = new \PDO("$driver:host=$host;dbname=$bd", $username, $password);
				$this->setPdo($pdo);
			}  catch ( \PDOException $ex ) {
				echo json_encode(array(
					"codigo" => Conexao::ERRO,
					"mensagem" => $ex->getMessage(),
				));
			}  catch ( Exception $ex ){
				echo json_encode(array(
					"codigo" => Conexao::ERRO,
					"mensagem" => $ex->getMessage(),
				));
			}
			
		}
		
	}
	
	public function setPdo($pdo){
		$this->pdo = $pdo;
	}
	
	public function getPdo(){
		return $this->pdo;
	}
	
	public function getAll($query, $params) {
		$bd = $this->getPdo();
        $prepare = $bd->prepare($query);
        $prepare->setFetchMode(\PDO::FETCH_ASSOC);
        $prepare->execute($params);
        $result = $prepare->fetchAll();
        return $result;
    }
	
}

?>
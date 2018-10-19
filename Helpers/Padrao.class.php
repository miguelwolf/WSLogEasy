<?php

namespace Helpers;

class Padrao {
	
	public function retornarJson($dados){
		$this->setHeaderJson();
		echo json_encode($dados);
		exit();
	}
	
	public function setHeaderJson(){
		header('Content-Type: application/json');
	}
}

?>
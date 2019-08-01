<?php 
class Produtos_model extends CI_Model{
	public function buscaTodos(){
		//coloca em um array todos os dados do banco de dados;
		//db  - banco de dados
		//produtos - tabela produtos
		return $this->db->get("produtos")->result_array();
	}

	//faz o insert do produto na tabela.
	public function salva($produto){
		$this->db->insert("produtos",$produto);
	}
}

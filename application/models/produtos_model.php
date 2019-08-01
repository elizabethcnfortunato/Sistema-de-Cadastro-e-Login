<?php 
class Produtos_model extends CI_Model{
		/** 
		 * db  - banco de dados
		*/



	public function busca($id){
		//traga o primeiro produto(row_array) com esse ID.
		return $this->db->get_where("produtos",array(
			"id" => $id
		))->row_array();
	}
	public function buscaTodos(){
	
		//produtos - tabela produtos
		//Retorne todos os elementos que estão na tabela produtos.
		return $this->db->get("produtos")->result_array();
	}

	//faz o insert do produto na tabela.
	//Insira na tabela PRODUTOS o $produto
	public function salva($produto){
		$this->db->insert("produtos",$produto);
	}
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller{

	public function nova(){
		$this->load->library('session');
		$usuario = autoriza();
		//sempre antes de usar o Helper na View, precisa importar ele.
		$this->load->helper("date_helper");
		$this->load->model("vendas_model");
		$venda = array(
			"produto_id" =>$this->input->post("produto_id"),
			"comprador_id"=>$usuario["id"],
			"date_de_entrega"=>dataPtParaMysql($this->input->post("data_de_entrega")));
		$this->vendas_model->salva($venda);
		$msg = "<div class='alert alert-sucess'> Pedido Realizado com Sucesso.</div>";
		$this->session->set_flashdata('success',$msg);
		redirect("/");
	}

	public function index(){
		/**
		 * REGRAS: Buscar todas as vendas que o usuario logado, vendeu.
		 */


		//sempre antes de usar o Helper na View, precisa importar ele.
		$this->load->helper("date_helper");
		$this->load->library('session');

		//pegar os usuario logado.
		$usuario = autoriza();
		echo $usuario;
		$this->load->model("produtos_model");
		//retorna todos os produtos que foram vendidos pelo $usuario. 
		$produtosVendidos = $this->produtos_model->buscaVendidos($usuario);

		//apresentação dos produtos vendidos, na tela
		$dados = array("produtosVendidos" => $produtosVendidos);
		$this->load->view("vendas/index",$dados);
	}


	public function busca($id){
		return $this->db->get_where("produtos",array(
			"id"=>$id
		))->row_array();
	}
}


?>

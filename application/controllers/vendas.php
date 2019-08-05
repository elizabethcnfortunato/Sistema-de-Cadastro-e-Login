<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller{

	public function nova(){
		$this->load->library('session');
		$usuario = autoriza();
		//sempre antes de usar o Helper na View, precisa importar ele.
		$this->load->helper("date_helper");
		$this->load->model(array("vendas_model","produtos_model","usuarios_model"));
		$venda = array(
			"produto_id" =>$this->input->post("produto_id"),
			"comprador_id"=>$usuario["id"],
			"date_de_entrega"=>
			dataPtParaMysql($this->input->post("data_de_entrega"))
		);
		$this->vendas_model->salva($venda);


		//configuraraçoes de EMAIL.
		$this->load->library("email");

		$config["protocol"] = "smtp";
		$config["smtp_host"] = "ssl://smtp.gmail.com";
		$config["smtp_user"] = "codeigniteralura@gmail.com";
		$config["smtp_pass"] = "123456";
		$config["charset"] = "utf-8";
		$config["mailtype"] = "html";
		$config["newline"] = "\r\n";
		$config["smtp_port"] = '465';
		$this->email->initialize($config);

		$produto = $this->produtos_model->busca($venda["produto_id"]);
		$vendedor = $this->usuarios_model->busca($produto["id_usuario"]);

		$dados = array("produto" => $produto);
		$conteudo = $this->load->view("vendas/email.php",$dados, TRUE);

		//enviando o email.
		$this->email->from("codeigniteralura@gmail.com","Mercado");
		$this->email->to($vendedor["email"]);
		$this->email->subject("Seu produto {$produto['nome']} foi vendido!");
		$this->email->message($conteudo);		
		$this->email->send();

		$this->load->view("vendas/email.php",$dados);
		$this->session->set_flashdata('success',"Pedido Realizado com Sucesso.");
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

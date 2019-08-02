<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller{
	public function nova(){
		$usuario = $this->session->userdata("usuario_logado");

		$this->load->model("vendas_model");
		$venda = array(
			"produto_id" =>$this->input->post("produto_id"),
			"comprador_id"=>$usuario["id"],
			"date_de_entrega"=>$this->input->post("data_de_entrega")
		);
		$this->vendas_model->salva($venda);
		$this->session->set_flashdata("success","Pedido de compra realizado com sucesso");
		redirect("/");
	}
}


?>

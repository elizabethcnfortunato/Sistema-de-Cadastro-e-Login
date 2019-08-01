<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller{
	public function index(){

		//Espécie de DEBUGG
		//$this->output->enable_profiler(TRUE);



		//carregando o database.
		//$this->load->database();
		//carregando o model produtos_model;
		$this->load->model("produtos_model");
		//resgatando dos produtos do model que resgata do banco
		// e mandando para a View.
		$produtos = $this->produtos_model->buscaTodos();
		
		// $dados, variável responsável pela integração entre o controle
		// e a view.

		$dados = array("produtos"=>$produtos);
		//carregar a base_url.
		$this->load->helper(array("currency"));
		
		//chama a view dos produtos.
		$this->load->view("produtos/index.php",$dados);
	}

	public function formulario(){
		$this->load->view("produtos/formulario");
	}

	public function novo(){
		$usuarioLogado  = $this->session->userdata("usuario_logado");
		$produto = array(
			"nome" => $this->input->post("nome"),
			"descricaotext" => $this->input->post("descricao"),
			"preco" => $this->input->post("preco"),
			"id_usuario" => $usuarioLogado["id"]
	
		);

		$this->load->model("produtos_model");
		$this->produtos_model->salva($produto);

		$msg = "<div class='alert alert-sucess'> Produto Registrado com Sucesso.</div>";
		$this->session->set_flashdata("success", $msg);
		redirect("/");
	}

	public function mostra(){
		//vemdo banco
		$id = $this->input->get("id");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$dados = array("produto" => $produto);
		$this->load->view("produtos/mostra",$dados);
	}
}



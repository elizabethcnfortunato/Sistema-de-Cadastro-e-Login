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
		
		$this->load->template("produtos/index.php",$dados);
	
	}

	public function formulario(){
		autoriza();
		$this->load->template("produtos/formulario");
	}

	public function novo(){
		autoriza();
	
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome","nome","required|min_length[5]|callback_nao_tenho_palavra_melhor");
		$this->form_validation->set_rules("descricao","descricao","trim|required|min_length[10]");
		$this->form_validation->set_rules("preco","preco","required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso = $this->form_validation->run();

		if($sucesso){

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
		}else{
			$this->load->template("produtos/formulario");
		}
	}

	public function mostra($id){
		$this->load->helper("typography");
		//vemdo banco
		//$id = $this->input->get("id");
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$dados = array("produto" => $produto);	
		$this->load->template("produtos/mostra",$dados);

	}

	public function nao_tenho_palavra_melhor($string){
		$posicao = strpos($string, "melhor");
		echo $posicao;
		if($posicao ===  FALSE){
			return TRUE;
		}else{
			$this->form_validation->set_message("nao_tenho_palavra_melhor","O campo '%s' não pode conter a palavra MELHOR");
			return FALSE;
		}

	}
}



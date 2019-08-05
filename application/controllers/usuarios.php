<?php defined('BASEPATH') OR exit('No direct script access allowed');
//essa classe ira receber os dados da view(que foram cadastrados no formulário) para manipular..
class Usuarios extends CI_controller{

	
	public function novo(){

		//Espécie de DEBUGG
		//$this->output->enable_profiler(TRUE);


		//Coletar em cada campo, os dados inserido pelo usuário.
		//md5 - criptografia de senha.
		$usuario = array(
		
			"nome"  => $this->input->post("nome"),
			"email" => $this->input->post("email"),
			"senha" => md5($this->input->post("senha"))
		);

		//PASSO1 - carregar os banco de dados
		//$this->load->database(); // agora o banco está sendo carregado usando o autoload

		//PASSO2 - carregar a model que será trabalhada
		$this->load->model("usuarios_model");
		
		//PASSO3 - Salvar os dados
		$this->usuarios_model->salva($usuario);
		$this->load->template("usuarios/novo");
	}
}

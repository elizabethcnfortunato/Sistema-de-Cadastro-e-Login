<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	public function autenticar(){
		$this->load->model("usuarios_model");
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));
		$usuario = $this->usuarios_model->buscaPorEmailESenha($email, $senha);

		if($usuario){
			//colocando a chave do usuario na sessão
			$this->session->set_userdata("usuario_logado", $usuario);

			//sessão temporária
			$msg = "<div class='alert alert-success'> Logado com sucesso.</div>";
			$this->session->set_flashdata("success",$msg);
		}else{
			//sessão temporária
			$msg = "<div class='alert alert-danger'> Senha ou Usuário incorreto. Por favor tente novamente.</div>";
			$this->session->set_flashdata("danger", $msg);
		}

		//redirecionamento de página, para a index.
		$this->load->view("login/autenticar", $dados);

		redirect('/');

	}

	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$msg = "<div class='alert alert-warning'> Você foi deslogado</div>";
		$this->session->set_flashdata("success", $msg);
		redirect('/');
	}
}

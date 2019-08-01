<html lang="en">
	<head>
		<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
	</head>
	<body>
		<!-- ViEW dos Produtos-->
		<!-- $produtos vem com os dados do controller -->
		<div class="container">
		
		<?= $this->session->flashdata("success")?>

			<h1>Produtos</h1>
			
			<table class = "table">
				<!-- *************LISTAGEM PRODUTOS************* -->
				<?php foreach ($produtos as $produto):?>
					<tr>
						<!-- listar todos os produtos q vêem do controler-->
						<td><?= returnIDCorrigido($produto['id']) ?>
						<td><?= anchor("produtos/mostra?id={$produto['id']}",$produto["nome"])?></td>
						<td><?= $produto["nome"]?></td>
						<td><?= numeroEmReais($produto["preco"])?></td>
					</tr>
				<?php endforeach ?>
			</table>
		
			<?php if($this->session->userdata("usuario_logado")){ ?>
				<?= anchor('login/logout','Logout',array("class"=>"btn btn-primary"))?>
				<?= anchor('produtos/formulario','Novo Produto',array("class"=>"btn btn-primary"))?>
			<?php }else { ?>
			<h1>Login</h1>

			<?php
			//*************LOGIN*************
			
			echo form_open("login/autenticar"); 

			echo form_label("Email","email");
			echo form_input(array(
				"name" => "email",
				"id" => "email",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Senha","senha");
			echo form_input(array(
				"name" => "senha",
				"id" => "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo "<br/>";

			echo form_button(array(
				"class"=>"btn btn-primary",
				"content" =>"Autenticar",
				"type" =>"submit"
			));



			echo form_close();
			?>
			<?php }?>



			<h1>Cadastro de Usuário</h1>

			<?php 
			//*************CADASTRO*************
			//chama a view
			echo form_open("usuarios/novo");

			
			echo form_label("Nome","nome");
			echo form_input(array(
				"name" => "nome",
				"id" => "nome",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Email","email");
			echo form_input(array(
				"name" => "email",
				"id" => "email",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Senha","senha");
			echo form_input(array(
				"name" => "senha",
				"id" => "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));


			echo "<br/>";

			echo form_button(array(
				"class"=>"btn btn-primary",
				"content" =>"Cadastrar",
				"type" =>"submit"
			));

			echo form_close();?>



		</div>
	</body>
</html>

<?php 
function returnIDCorrigido($par){
	if($par <10){
		$a = "0".$par;
   }else{
		$a = $par;
   }
   return $a;
}
?>
